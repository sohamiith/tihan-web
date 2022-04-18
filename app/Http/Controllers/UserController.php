<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
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
            if($user->user_type == 1)
            {
                $person = Student::where(['roll_no'=>$user->emp_id])->first();
            }
            else if($user->user_type == 2)
            {
                //$person = Student::where(['roll_no'=>$user->emp_id])->first();
            }
            else
            {
                $person = (object)['full_name'=>'Admin'];
            }

            Session::put('user',$user);
            Session::put('person',$person);
            return redirect('/admin-dashboard');
        }
    }
}
