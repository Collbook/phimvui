<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;

class AdminController extends Controller
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
    public function index()
    {
        // Tính lượt đăng ký trong ngày
        $today    = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $count_register = Admin::where('created_at', '>=', $today)
                                ->where('created_at', '<', $tomorrow)
                                ->count();
        // echo $count_register;die();

        return view('admin.dashboard.index', ['count_register' => $count_register]);
    }
}
