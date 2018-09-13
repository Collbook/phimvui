<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
Use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use Auth;
use App\Http\Controllers\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout');
    }
    public function getdangki()
    {
        return view('frontend.login.register');
    }

    public function postdangki(Request $request)
    {

        $request->validate(
            [
                'username' => 'required',
                'email' => 'required|email|unique:customers,email',
                'fullname' => 'required',
                'birthday' => 'required',
                'avatar' => 'required',
                'password' => 'required|min:5|max:20',
                're_password' => 'required|same:password',

            ], [
            'username.required' => 'Vui lòng nhập Username',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique' => 'Email này đã tồn tại',
            'fullname.required' => 'Vui lòng nhập Name',
            'birthday.required' => 'Vui lòng nhập Ngày sinh',
            'avatar.required' => 'Vui lòng chọn ảnh',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu nhiều hơn 5 kí tự',
            'password.max' => 'Vui lòng nhập mật khẩu nhỏ hơn 20 kí tự',
            're_password.required' => 'Vui lòng nhập lại mật khẩu',
            're_password.same' => 'Mật khẩu không trùng nhau'
        ]);
        // Lấy đuôi file image
        $file = $request->avatar;
        //$file_exte = $file->getClientOriginalExtension();
        // Tên hình ảnh
        $file_img = $file->getClientOriginalName();
        //$file_img = $file->getClientOriginalName().$file_exte;

        // Tao thông tin người dùng mới
        $customer           = new Customer();
        $customer->username = $request->username;
        $customer->email    = $request->email;
        $customer->fullname = $request->fullname;
        $customer->birthday = $request->birthday;
        $customer->avatar   = $file_img;
        $customer->password = Hash::make($request->password);
        $customer->save();
        // Lấy tên thư mục chứa dựa theo id.
        $file_path = 'public/customers/' . $customer->id;
        // Lưu hình ảnh vào thư mực chứa.
        /*
        -file_path: đường dẫn chứa ảnh
        -file('avatar'): type và name thẻ input
        -$file_img: Tên hình ảnh
        */
        Storage::putFileAs($file_path, $request->file('avatar'), $file_img);
        //$file->move('assets/frontend/images/customer/', $file_img);
        return redirect()->route('login')->with('thongbao', ' Tạo Tài Khoản Thành Công ');

    }

    public function getLogin()
    {
        return view('frontend.login.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:5|max:20',
            ], [
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Email chưa đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu nhiều hơn 5 kí tự',
            'password.max' => 'Vui lòng nhập mật khẩu nhỏ hơn 20 kí tự'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Đăng Nhập Không Thành Công ');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
