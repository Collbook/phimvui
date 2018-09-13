<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Storage;
use File;
use Redis;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        // $redis = Redis::connection();
        // $id = Auth::guard('admin')->id();
        // if ($redis->exists('profile' . $id)) {
        //     $profile = Redis::get('profile' . $id);
        //     echo $profile;
        // } else {
        //     $html = view('admin.profiles.index')->render();
        //     Redis::set('profile' . $id, $html);
        //     $profile = Redis::get('profile' . $id);
        //     echo $profile;
        // }
        
        return view('admin.profiles.index');
    }

    public function editProfile()
    {
        return view('admin.profiles.index');
    }

    public function updateProfile(Request $request)
    {
        $id       = Auth::guard('admin')->id();
        $admin    = Auth::guard('admin')->user();
        $username = $request->username;
        $password = $request->password;
        $admins   = Admin::where('username', $username);

        if (Hash::check($password, $admin->password)) {
            if ($username == Auth::guard('admin')->user()->username OR $admins->count() == 0) {
                $admin           = Admin::find($id);
                $admin->username = $request->username;
                $admin->birthday = $request->birthday;
                $admin->fullname = $request->fullname;
                $admin->save();

                return back()->with('status-success', 'Chúc mừng. Bạn đã cập nhật thông tin thành công!');
            } else {
                return back()->with('status-error', 'Có lỗi. Cập nhật thông tin thất bại!');
            }
        } else {
            return back()->with('status-error', 'Có lỗi. Mật khẩu không hợp lệ!');
        }    
    }

    public function changeEmail(Request $request)
    {
        $password = $request->password;
        $email    = $request->new_email;
        // dd($email);die();
        $admin    = Auth::guard('admin')->user();
        if (!empty($email)) {
            if(Hash::check($password, $admin->password)){
                $id       = Auth::guard('admin')->id();
                $admins   = Admin::where('email', $email);
                if ($email == Auth::guard('admin')->user()->email OR $admins->count() == 0) {
                    $admin        = Admin::find($id);
                    $admin->email = $request->new_email;
                    $admin->save();

                    return back()->with('status-success', 'Chúc mừng. Bạn đã cập nhật email thành công!');
                } else {
                    return back()->with('status-error', 'Có lỗi. Cập nhật email thất bại!');
                }
            }else{
                return back()->with('status-error', 'Mật khẩu của bạn không hợp lệ. Vui lòng thử lại!');
            }
        } else {
            return back()->with('status-error', 'Email không được để trống. Vui lòng thử lại!');
        }   
    }

    public function changePassword(Request $request)
    {
        $password = $request->old_password;
        $admin = Auth::guard('admin')->user();
        if(Hash::check($password, $admin->password)){
            $new_password = bcrypt($request->new_password);
            Admin::where('username', $admin->username)->update(['password' => $new_password]);
            return back()->with('status-success', 'Chúc mừng. Bạn đã đổi mật khẩu thành công!');
        }else{
            return back()->with('status-error', 'Mật khẩu của bạn không hợp lệ. Vui lòng thử lại!');
        }
        
    }

    public function checkUserName(Request $request)
    {
        // $username_curent = Auth::guard('admin')->user()->username;
        $username = $request->username;
        $usernames = Admin::where('username', '=', $username)->count();
        return response()->json($usernames);
    }

    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $emails = Admin::where('email', '=', $email)->count();
        return response()->json($emails);
    }

    public function changeAvatar (Request $request)
    {
        $id         = Auth::guard('admin')->id();
        $file       = $request->avatar;
        $file_name  = $id;
        $file_exte  = $file->getClientOriginalExtension();
        $avatar_old = Auth::guard('admin')->user()->avatar;
        // dd($avatar_old);die();

        // Lấy tên đường dẫn
        $file_path = 'public/admins/' . $file_name;

        // Tên hình ảnh moi
        $file_img = 'avatar.' . $file_exte;
        // dd($file_img);die();

        // Update CSDL
        $admin = Admin::findOrFail($id);
        $admin->avatar = $file_img;
        $admin->save();

        // Update avatar moi
        Storage::putFileAs($file_path, $request->file('avatar'), $file_img);

        // Xoa Avatar cu
        Storage::delete($file_path . '/' . $avatar_old);

        return redirect()->back();
    }

    public function destroy (Request $request) 
    {
        $password = $request->password;
        $admin = Admin::findOrFail(Auth::guard('admin')->id());
        $id = $admin->id;

        if(Hash::check($password, $admin->password)){
            Auth::guard('admin')->logout();

            if ($admin->delete()) {
                // Xoa file avatar
                $directory = 'public/admins/' . $id;
                Storage::deleteDirectory($directory);

                return redirect()->route('admin.login')->with('status', 'Tài khoản của bạn đã xóa thành công!');
            }
        }else{
            return back()->with('status-error', 'Mật khẩu của bạn không hợp lệ. Vui lòng thử lại!');
        }
    }
}
