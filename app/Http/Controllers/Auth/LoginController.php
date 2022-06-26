<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
    }
    public function rules()
    {
        return [
            'login' => 'required',
            'password' => 'required'
        ];
    }
    public function username()
    {
        return 'login';
    }
    protected function credentials(Request $request)
    {
            $mobile = preg_replace('~^[0\D]++|\D++~', '', $request->login);
            $field = filter_var($mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
            $request->merge([$field => $mobile]);
            return $request->only($field, 'password');

    }
    protected function redirectTo()
    {
        session()->flash('color', 'success');
        session()->flash('message', ' با موفقیت وارد شدید.');
        return Config('platform.redirectTo');
    }
   protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required',
        ]);

}
}
