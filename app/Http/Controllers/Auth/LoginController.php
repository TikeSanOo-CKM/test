<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:client')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('admin.auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:3'
        ]);
        // dd('haha');

         if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        // dd('ha');
       // $response = Http::get('http://haha.tikesanoo.tech/api/products');
       // $response->body();
     //  $response = Http::post('http://haha.tikesanoo.tech/api/products', [
    //    'name' => 'Steve',
    //    'detail' => 'Network Administrator',
    //]);
    //dd($response->body());
        return redirect()->intended('/admin');
         }
         return back()->withInput($request->only('email', 'remember'));
    }

    // app/Http/Controllers/Auth/LoginController.php

    public function showClientLoginForm()
    {
        return view('client.auth.login', ['url' => 'client']);
    }

    public function clientLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:3'
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/client');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function Email_send($subject,$data,$blade_name){
        //  $subject = '【J-SAT NAVI】パスワードの再設定完了メール';
        //  $data = array(
         //     'mailaddress' => 'ayemyawai555@gmail.com',
         //     'user_name' => 'ayemyawai',
          //    'password' => '1111',
        //      'subject' => $subject
        //  );

          Mail::send($blade_name, [
              'data' => $data
          ], function ($message) use ($data) {
              $message->from('navi@j-sat.jp', 'J-SAT NAVI');
              $message->to($data['mailaddress']);
              $message->subject($data['subject']);
          });
      }


}
