<?php

namespace App\Http\Controllers\Auth\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;

class ResetPasswordController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Password Reset Controller
  |--------------------------------------------------------------------------
  |
  | This controller is responsible for handling password reset requests
  | and uses a simple trait to include this behavior. You're free to
  | explore this trait and override any methods you wish to tweak.
  |
  */

  use ResetsPasswords;

  /**
   * Where to redirect users after resetting their password.
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
      $this->middleware('guest:patient');
  }

  protected function guard()
  {
      return Auth::guard('patient');
  }

  protected function broker()
  {
      return Password::broker('patients');
  }

  /**
   * Display the password reset view for the given token.
   *
   * If no token is present, display the link request form.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string|null  $token
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function showResetForm(Request $request, $token = null)
  {
      return view('frontend.auth.patient.passwords.reset')->with(
          ['token' => $token, 'email' => $request->email]
      );
  }
}
