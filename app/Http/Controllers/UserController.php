<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    //
    function login(Request $req)
    {
    	$message = '';
    	$user= User::where(['email'=>$req->username])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
        	$message = 'Incorrect Username or password';
        	return view('admin/admin-login', ['message' => $message]);
        }
        else
        {
        	unset($user->password);
            $req->session()->put('user',$user);
            return redirect('/admin-dashboard');
        }
    }
}
