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

    function saveStudents(Request $req)
    {
        $file_path = null;
        /*$req->validate([
            'roll_no' => 'required',
            'full_name' => 'required',
            'date_of_joining' => 'required'
        ]);*/
        var_dump($req->photo);
        var_dump($req->hasFile('photo'));
        var_dump($req->hasFile('file'));
        $req->photo->store('images', 'public');
            $file_path = $req->photo->hashName();
            var_dump($file_path);
        if ($req->hasFile('photo')) {

            $req->validate([
                'image' => 'mimes:jpeg,bmp,png,jpg' //Only allow jpeg,jpg,bmp,png
            ]);

            $req->file->store('images', 'public');
            $file_path = $req->file->hashName();
            var_dump("here");
        }
            
        var_dump($file_path);
        var_dump($req->full_name);exit();

            // Store the record, using the new file hashname which will be it's new filename identity.
            /*$product = new Product([
                "name" => $request->get('name'),
                "file_path" => $request->file->hashName()
            ]);
            $product->save();*/ // Finally, save the record.

        /*$user= User::where(['email'=>$req->username])->first();
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
        }*/
    }
}
