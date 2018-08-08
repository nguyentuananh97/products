<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin.auth')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function logout(Request $request)
    {

        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect('/admin/login');
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
     protected function guard()
    {
        return Auth::guard('admin');
    }
}
