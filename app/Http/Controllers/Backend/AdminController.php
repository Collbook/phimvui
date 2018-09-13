<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\Film;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Storage;
use Event;
use App\Events\LockUser;
use App\Events\RegisterAdmin;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('quan-ly-thanh-vien-quan-tri', Admin::class);
        $admins   = Admin::all();
        // $admins   = Admin::select('username', 'level', 'active', 'avatar', 'status', 'time_lock_end', 'email', 'fullname')->get();
        $time_now = Carbon::now();

        // $roles = Role::all();
        $roles = Role::select('id','name')->get();
        
        // Unlock User
        // foreach ($admins as $admin) {
        //     if ($admin->time_lock_end < $time_now) {
        //         Admin::where('username', $admin->username)->update(['time_lock_end'  => null, 'status' => 1]);
        //     }
        // }
        
        return view('admin.admins.list', ['admins' => $admins, 'roles' => $roles]);
    }

    public function list()
    {   
        return $admins = Admin::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create');
        // return view('admin.admins.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Tạo người dùng quản trị mới
    public function store(Request $request)
    {
        // dd($request->input());die();
        $this->authorize('create', Auth::guard('admin')->user());

        // Lấy thông tin người dùng mới
        $admin              = new Admin;
        $admin->email       = $request->email;
        $admin->password    = bcrypt($request->email);
        $admin->fullname    = $request->fullname;
        $admin->email_token = base64_encode($request->email);
        $admin->created_at  = Carbon::now();
        $admin->updated_at  = Carbon::now();
        $admin->save();

        $admin = Admin::findOrFail($admin->id);
        // event(new LockUser($admin));
        event(new RegisterAdmin($admin));

        $admins = Admin::all();
        $roles  = Role::all();
        return view('admin.admins.list-user', compact('admins', 'roles'));
    }

    // Verification Email
    public function verificationEmail(Admin $admin, $email_token)
    {
        $this->authorize('xac-thuc-tai-khoan', Admin::class);
        $admin = Admin::where('email_token', $email_token)->first();
        $admin->active = 1;
        if($admin->save()){
            return view('admin.admins.verification-email');
        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin, $username)
    {
        $this->authorize('view', Auth::guard('admin')->user());

        $admin = Admin::where('username', $username)->get();
        // dd($admin->toArray());
        return view('admin.admins.show', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    // Thành viên quản trị xác thực tài khoản
    public function addAccount($email_token)
    {
        // $this->authorize('view', Auth::guard('admin')->user());

        $admin = Admin::where('email_token', $email_token)->get()->first();
        // dd($admin->email);die();
        return view('admin.admins.verification_email', ['admin' => $admin]);
    }

    // Thành viên quản trị xác thực tài khoản
    public function postAccount(Request $request, $email_token)
    {
        // Lấy đuôi file image
        $file = $request->avatar;
        $file_exte = $file->getClientOriginalExtension();

        // Tên hình ảnh
        $file_img = 'avatar.' . $file_exte;

        // Lấy thông tin người dùng mới
        $id                 = Admin::where('email_token', $email_token)->get()->first()->id;
        $admin              = Admin::find($id);
        $admin->username    = $request->username;
        $admin->email       = $request->email;
        $admin->password    = bcrypt($request->password);
        $admin->fullname    = $request->fullname;
        $admin->birthday    = $request->birthday;
        $admin->active      = 1;
        $admin->email_token = null;
        $admin->avatar      = $file_img;
        $admin->save();
        
        // Lấy tên thư mục chứa.
        $file_path = 'public/admins/' . $admin->id;
        
        // Lưu hình ảnh vào thư mực chứa.
        Storage::putFileAs($file_path, $request->file('avatar'), $file_img);

        return redirect()->route('admin.profile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Auth::guard('admin')->user());

        // Kiem tra mat khau dung khong
        $password   = $request->password;
        $level      = $request->level;
        $admin_auth = Auth::guard('admin')->user();
        $ids        = $request->id;
        $ids_length = $request->ids_length;

        if (Hash::check($password, $admin_auth->password)) {
            Admin::findOrFail($id)->update(['level' => $level]);

            // Thêm quyền vào bảng admin_role
            $admin = Admin::findOrFail($id);
            if ($ids_length == 0) {
                $admin->roles()->detach();
            } else {
                $admin->roles()->sync($ids);
            }

            $admins = Admin::all();
            $roles  = Role::all();
            return view('admin.admins.list-user', compact('admins', 'roles'));
        } else {
            return 0;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $this->authorize('delete', Auth::guard('admin')->user());

        $password = $request->password;
        $admin    = Auth::guard('admin')->user();

        if (Hash::check($password, $admin->password)) {
            $admin_id = Auth::guard('admin')->user()->id;
            Film::where('admin_id', $id)->update(['admin_id' => $admin_id]);
            Admin::where('id', $id)->delete();

            $directory = 'public/admins/' . $id;
            Storage::deleteDirectory($directory);

            $admins = Admin::all();
            $roles  = Role::all();
            return view('admin.admins.list-user', compact('admins', 'roles'));
        } else {
            return 0;
        }
    }

    public function lock(Request $request, $id)
    {
        $this->authorize('update', Auth::guard('admin')->user());

        // return $id;die();
        Admin::where('id', '=',$id)
                ->update(['time_lock_end' => $request->time_lock_end, 'status' => 0]);

        // Gửi email thông báo đến người dùng thông qua sự kiện LockUser
        $admin = Admin::findOrFail($request->id);
        event(new LockUser($admin));
        
        $admins = Admin::all();
        $roles  = Role::all();
        return view('admin.admins.list-user', compact('admins', 'roles'));


    }

    public function unlock($id)
    {
        $this->authorize('update', Auth::guard('admin')->user());

        $admin = Admin::where('id', $id)
                        ->update(['time_lock_end'  => null, 'status' => 1]);
        
        $admins = Admin::all();
        $roles  = Role::all();
        return view('admin.admins.list-user', compact('admins', 'roles'));
    }

    public function MultiDeleteAdmin (Request $request)
    {
        $this->authorize('view', Auth::guard('admin')->user());

        // Kiem tra mat khau dung khong
        $password = $request->password;
        $admin    = Auth::guard('admin')->user();
        $ids      = $request->id;

        if (Hash::check($password, $admin->password)) {
            $admin_id = Auth::guard('admin')->user()->id;
            Film::whereIn('admin_id', $ids)->update(['admin_id' => $admin_id]);
            Admin::whereIn('id', $ids)->delete();

            // Xoa thu muc
            foreach ($ids as $id) {
                $directory = 'public/admins/' . $id;
                Storage::deleteDirectory($directory);
            }

            $admins = Admin::all();
            $roles  = Role::all();
            return view('admin.admins.list-user', compact('admins', 'roles'));
        } else {
            return 0;
        }
    }

    public function MultiUnlockAdmin (Request $request)
    {
        $this->authorize('view', Auth::guard('admin')->user());
        
        // Kiem tra mat khau dung khong
        $password = $request->password;
        $admin    = Auth::guard('admin')->user();
        $ids      = $request->id;

        if (Hash::check($password, $admin->password)) {
            Admin::whereIn('id', $ids)->update(['time_lock_end'  => null, 'status' => 1]);

            $admins = Admin::all();
            $roles  = Role::all();
            return view('admin.admins.list-user', compact('admins', 'roles'));
        } else {
            return 0;
        }
    }
}
