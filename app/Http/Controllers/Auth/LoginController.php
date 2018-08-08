<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;

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
    protected $redirectTo = '/list';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function logout(Request $request)
    {

        $this->guard()->logout();
        $request->session()->forget('id');
        $request->session()->forget('name');
        $request->session()->invalidate();

        return redirect('/login');
    }
    // public function username()
    // {
    //     return 'username';
    // }
    // public function username()
    // {
    //    $login = request()->username;
    //    $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    //    request()->merge([$field => $login]);
    //    return $field;
    // }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        // $customer = User::updateOr
    }
}
