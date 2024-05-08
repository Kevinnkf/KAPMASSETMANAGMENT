<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset emails and
      | includes a trait which assists in sending these notifications from
      | your application to your user. Feel free to explore this trait.
      |
      */

    public function __construct()
    {
        $this->middleware('guest');
    }

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        $pageConfigs = ['bodyCustomClass' => 'bg-full-screen-image blank-page', 'navbarType' => 'hidden'];

        return view('/auth/passwords/email', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    public function sendToken(Request $request) {
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            $userDetail = UserDetail::where('user_id', '=', $user->id)->where('external_flag', '=', 1)->first();
            if ($userDetail) {
                $user->reset_token = Helper::generateRandomString(30);
                if ($user->save()) {
                    $this->sendMailReset($user->reset_token, $user->email, $userDetail->nama);
                    Session::flash('success', 'Kirim link ubah password berhasil, mohon untuk cek email anda.');
                    return redirect()->route('login');
                }
                Session::flash('error', 'Reset password gagal, mohon untuk ulangi beberapa saat lagi.');
                return redirect()->route('password.request');
            }
        }
        Session::flash('error', 'Email tidak ditemukan.');
        return redirect()->route('password.request');
    }

    public function sendMailReset($token, $mail, $nama) {
        $url = [
            'link' => route('reset-password-form', $token),
            'nama' => $nama
        ];

        Mail::to($mail)->send(new ForgotPassword($url));
    }

    public function resetPasswordForm($token) {
        $user = User::where('reset_token', '=', $token)->first();
        if ($user) {
            $pageConfigs = ['bodyCustomClass' => 'bg-full-screen-image blank-page', 'navbarType' => 'hidden'];

            return view('/auth/passwords/reset', [
                'pageConfigs' => $pageConfigs,
                'token' => $token
            ]);
        }
        Session::flash('error', 'Token Expired.');
        return redirect()->route('login');
    }

    public function resetPasswordPost(Request $request) {
        $rules = [
            'password' => 'required|confirmed|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
        ];

        $customMessages = [
            'required' => 'Kolom :attribute tidak boleh kosong.',
            'confirmed' => 'Konfirmasi password tidak sama.',
            'min' => 'Minimal password harus lebih dari 8 karakter',
            'regex' => 'Password harus mengandung minimal 1 huruf besar dan kecil serta angka.',
        ];

        $this->validate($request, $rules, $customMessages);

        $user = User::where('reset_token', '=', $request->token)->first();
        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->save();

        Session::flash('success', 'Reset password berhasil, silahkan login untuk melanjutkan.');
        return redirect()->route('login');
    }
}
