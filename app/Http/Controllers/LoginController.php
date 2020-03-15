<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function post_login(Request $request)
    {
        $condition = false;
        $user = DB::table('tb_user')
            ->where('username',$request->get('username'))
            ->first();

        if ($user != null) {                
              if ($user->username == $request->get('username') && $user->password == $request->get('password')) {
                  $condition = true;
              }
        }     

        if ($condition) {
            Session::put('is_login', true);
            Session::put('id',$user->id);         
            Session::put('name',$user->nama_user);
            Session::put('role',$user->role);
            return [
                "status" => "success",
                "redirect_route" => "dashboard" 
            ];
        }

        return [
            "status" => "error",
            "message" => "User is not valid"
        ];
 
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('login')->with('status','Logout Successfully');
    }
}
