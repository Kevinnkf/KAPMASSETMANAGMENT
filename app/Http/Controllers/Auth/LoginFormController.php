<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use App\Helpers\HttpRequest;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\LoginStatus;

use Illuminate\Support\Facades\Http;

class LoginFormController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticate(Request $request){
        # VALIDASI LOGIN
        $this->validateLogin($request);

        # VALIDASI BRUTE FORCE
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        # VALIDASI USER INTERNAL / EKSTERNAL
        // if ($user['detail']->external_flag == 0) {
            $response = $this->loginInternal($request->username, $request->password);

            if ($response['status'] == 200) {
                $session['userdata'] = $response['data'];
                $session['token'] = $response['data']['token'];
                session($session);
                //success login
                return redirect('/');
            }
            // $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request, $response['message']);
        // } else {
        //     if ($this->attemptLogin($request)) {
        //         $lock = $this->countPassword($request->username, 1);
        //         return $this->sendLoginResponse($request);
        //     }

        //     $this->incrementLoginAttempts($request);
        //     $lock = $this->countPassword($request->username, 2);
        //     return $this->sendFailedLoginResponse($request, $lock['message']);
        // }
    }

    /*
     * Ambil data user ke table user
     */
    protected function getUser($username) {
        $user = User::where('username', '=', $username)->get()->first();
        $date = date('Y-m-d');
        if ($user) {
            $userDetail = UserDetail::where('user_id', '=', $user->id)->get()->first();
            if ($userDetail) {
                if ($user->status != 1) {
                    $message = ($user->status == 2) ? 'User Terkunci, Mohon Untuk Hubungi Administrator.' : 'User Tidak Aktif, Mohon Untuk Hubungi Administrator.' ;
                    return ['status' => 500, 'message' => $message];
                }

                if ($date < $user->start_date || $date > $user->end_date) {
                    $user->status = 0;
                    $user->save();
                    return ['status' => 500, 'message' => 'User Tidak Aktif, Mohon Untuk Hubungi Administrator.'];
                }

                return [
                    'status' => 200,
                    'user' => $user,
                    'detail' => $userDetail
                ];
            }
            return ['status' => 500, 'message' => 'User Detail Tidak Ditemukan, Mohon Untuk Hubungi Administrator.'];
        }
        return ['status' => 500, 'message' => 'User Tidak Ditemukan.'];
    }

    /*
     * Validasi Login
     */
    protected function validateLogin(Request $request)
    {
        $rules = [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|same:cptres'
        ];

        $customMessages = [
            'same' => 'Captcha not valid.'
        ];

        $this->validate($request, $rules, $customMessages);
    }

    /*
     * Login user internal
     */
    protected function loginInternal($username, $password) {
        $response = HttpRequest::loginEmployeeRequest($username, $password);
        // var_dump($response);die();
        if ($response['status'] == 200) {
            $data = $response['data'];
            if (isset($data)) {
                // $lock = $this->countPassword($username, 1);
                return ['status' => 200, 'data' => $data];
            }
            // $lock = $this->countPassword($username, 2);
            // return ['status' => 500, 'message' => $lock['message']];
        }
        return $response;
    }

    /*
     * Count Salah Password
     */
    protected function countPassword($username, $status) {
        $user  = User::where('username', '=', $username)->get()->first();
        $count = LoginStatus::where('user_id', '=', $user->id)->get()->first();
        $msg = '';
        if ($status == 1) {
            if ($count) {
                $count->count = 0;
                $count->modifiedon = Carbon::now();
                $count->save();
                return ['status' => 200];
            }
        } else {
            if (empty($count)) {
                $count = new LoginStatus();
                $count->user_id   = $user->id;
                $count->createdon = Carbon::now();
                $count->count     = 1;
            } else {
                $count->count = $count->count + 1;
                $msg = 'Username Atau Password Tidak Valid. Count : ' . $count->count;
                if ($count->count == 3) {
                    $user->status = 2;
                    $user->modifiedby = 1;
                    $user->modifiedon = Carbon::now();
                    $user->save();
                    $msg = 'User Terkunci.';
                }
            }
            $count->modifiedon = Carbon::now();
            $count->save();
            return ['status' => 500, 'message' => $msg];
        }
    }

    /*
     * Username yang digunakan untuk login
     */
    public function username()
    {
        return 'username';
    }

    # FUNGSI LOGIN BY ID
    protected function loginId($id, $request) {
        return $this->guard()->loginUsingId($id, $request->filled('remember'));
    }

    # FUNGSI LOGIN KE APLIKASI
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    # RESPONSE LOGIN BERHASIL
    protected function sendLoginResponse(Request $request)
    {
        // $request->session()->regenerate();
        // $this->clearLoginAttempts($request);

        // $session['userdata'] = $jsonResponse;
        // $session['token'] = $jsonResponse->token;
        // session($session);
        // //success login
        // return redirect('/');

        // if ($response = $this->authenticated($request, $this->guard()->user())) {
        //     return $response;
        // }

        // return redirect('/');

        // return $request->wantsJson()
        //     ? new JsonResponse([], 204)
        //     : redirect()->intended($this->redirectPath());
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    # RESPONSE LOGIN GAGAL
    protected function sendFailedLoginResponse(Request $request, $message = null)
    {
        if ($message) {
            throw ValidationException::withMessages([
                $this->username() => [$message],
            ]);
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    # AUTH
    protected function authenticated(Request $request, $user)
    {
        //
    }

    # GUARD
    protected function guard()
    {
        return Auth::guard();
    }
}
