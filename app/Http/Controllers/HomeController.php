<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoginController $loginController)
    {
       // $this->middleware('auth');
       $this->logincontroller = $loginController;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function email_send(){
        $this->logincontroller->Email_send('【J-SAT NAVI】パスワードの再設定完了メール',
        array(
                 'mailaddress' => 'ayemyawai555@gmail.com',
                 'user_name' => 'ayemyawai',
                 'password' => '1111',
                 'subject' => '【J-SAT NAVI】パスワードの再設定完了メール'
        ),'email');
        return view('home');
    }
}
