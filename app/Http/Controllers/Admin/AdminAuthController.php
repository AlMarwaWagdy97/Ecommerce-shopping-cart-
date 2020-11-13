<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{

    public function index(){
        return view('admin.Categories.home');
    }

    public function ShowloginForm(){
        return view('admin.login');
    }

    public function login_post(Request $request){
        $rememberme = $request->remeberme == 1 ? true : false ;

        $data  = array(
            'email'=>$request->email,
            'password' =>$request->Password,
         );
        if(Admin()->attempt($data,$rememberme)):
            return redirect('admin/');
        else:
            session()->flash('invalid_login_data');
            return redirect(aurl('login'));
        endif;
    }

    public function logout()
    {
        Admin()->logout();
        return redirect(aurl('login'));
    }
}
