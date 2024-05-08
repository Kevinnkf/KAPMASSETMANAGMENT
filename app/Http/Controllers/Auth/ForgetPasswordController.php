<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Helpers\HttpRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ForgetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetPasswordForm()
    {
        $urlSlideLogin = HttpRequest::originPath() . Config::get('constants.SLIDE_LOGIN_GET_DATA');

        return view('auth.forget-password', [
            'urlSlideLogin' => $urlSlideLogin,
        ]);
    }

    public function postResetPassword(Request $dto)
    {
        try {
            $response = HttpRequest::requestResetPassword("POST", Config::get('constants.RESET_PASSWORD'), $dto);
            if ($response['status'] != 200) {
                $isValidation = $response['status'] == 400 && !is_string($response['message']);
                return $this->error($response['status'], $response['message'], $isValidation);
            }

            return $this->success($response, $response['message']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->error(500, 'Reset Lupa Password Gagal : ' . $th->getMessage());
        }
    }

    public function postResetPasswordOtp(Request $dto)
    {
        try {
            $response = HttpRequest::requestResetPassword("POST", Config::get('constants.VALIDATE_PASSWORD_OTP'), $dto);
            if ($response['status'] != 200) {
                $isValidation = $response['status'] == 400 && !is_string($response['message']);
                return $this->error($response['status'], $response['message'], $isValidation);
            }

            return $this->success($response, $response['message']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->error(500, 'Reset Lupa Password Gagal : ' . $th->getMessage());
        }
    }

    public function showChangePasswordForm(Request $dto)
    {
        $urlSlideLogin = HttpRequest::originPath() . Config::get('constants.SLIDE_LOGIN_GET_DATA');

        return view('auth.change-password', [
            'urlSlideLogin' => $urlSlideLogin,
            'username' => $dto['username']
        ]);
    }

    public function postChangePassword(Request $dto)
    {
        try {
            // $dto->merge([
            //     'signature' => decryptSignatureResetPassword($dto['signature']),
            // ]);

            $response = HttpRequest::requestResetPassword("POST", Config::get('constants.CHANGE_RESET_PASSWORD'), $dto);
            if ($response['status'] != 200) {
                $isValidation = $response['status'] == 400 && !is_string($response['message']);
                return $this->error($response['status'], $response['message'], $isValidation);
            }

            return $this->success(null, 'Reset Lupa Password Berhasil');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->error(500, 'Reset Lupa Password Gagal : ' . $th->getMessage());
        }
    }
}
