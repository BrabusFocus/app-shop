<?php

namespace Facrinama\Http\Controllers\Auth;

use Facrinama\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request  as IluminateRequest;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
      return 'username';
    }
/**
 * Al iniciarse sesion se eejcuta este metodo y crea la session redirect_to
 */
    public function showLoginForm(IluminateRequest $request)
    {
      if ($request->has('redirect_to')) {
        session()->put('redirect_to',$request->input('redirect_to'));
      }

      return view('auth.login');
    }
/**
 * Redirigimos al usuario a lo que estaba viendo antes de logearse
 */
    public function redirectTo()
    {
      /**
       * con pull('redirect_to'); obtenemos el valor de la variable y eliminamos su existencia
       */
      if (session()->has('redirect_to')) {
      return session()->pull('redirect_to');
      }
      return $this->redirectTo;
    }

    /**
     * Este metodo se registribe para lograr iniciar session con el campo username y no con el
     * email que viene por defecto
     */

}
