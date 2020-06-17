<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('auth.login');
    }
    function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $users = Auth::users();
            if($users->role =="admin"){
                 return redirect()->route('admin.dashboard');
            }else{
               
                return redirect()->route('home');
            }
        }else{
            return '789';
           // return redirect()->route("auth.login",["error"=>"Invallid username or password"]);
        }

        }
    }

   

