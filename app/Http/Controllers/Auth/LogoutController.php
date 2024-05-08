<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers\Menus;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('user-auth');
    }

    public function logout(Request $request)
    {
        if(Session::get('error')){
            $pesan = Session::get("error");
            $err = 1;
        }else{
            $err = 0;
        }
        $request->session()->flush();
        $request->session()->regenerate();

        if($err == 1){
            return redirect(url('login'))->with('error',$pesan);
        }else{
            return redirect(url('login'));
        }

    }
}
