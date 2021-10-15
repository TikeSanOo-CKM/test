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
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://localhost:8000/api/products";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }

    public function email_send()
    {
        $this->logincontroller->Email_send(
            '【J-SAT NAVI】パスワードの再設定完了メール',
            array(
                'mailaddress' => 'ayemyawai555@gmail.com',
                'user_name' => 'ayemyawai',
                'password' => '1111',
                'subject' => '【J-SAT NAVI】パスワードの再設定完了メール'
            ),
            'email'
        );
        return view('home');
    }
}
