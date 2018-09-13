<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //trang controller quan ly thong tin lien he cua trang
    //lien he
    public function lienhe()
    {
        return view('frontend.about.contact',$this->data);
    }
    //trang chinh sach
    public function chinhsach()
    {
        return view('frontend.about.policy' ,$this->data);
    }
    //trang dieu khoan
    public function dieukhoan()
    {
        return view('frontend.about.provision',$this->data);
    }
    //trang nguyen tac
    public function nguyentac()
    {
        return view('frontend.about.rule',$this->data);
    }
    //trang hoi dap
    public function hoidap()
    {
        return view('frontend.about.question',$this->data);
    }    

}
