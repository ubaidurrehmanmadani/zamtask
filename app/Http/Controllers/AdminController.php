<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserNotification;
use App\Models\User;

class AdminController extends Controller
{
    public function adminHome(){
        return view('adminHome');
    }


    public function addAdmin(Request $request)
    {        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => app('hash')->make('123456'),
            'role' => User::ADMIN_ROLE
        ]);

        $user->notify(new UserNotification(new User));

        if($user){
            return redirect('home')->with('success','Admin Created Sucessfully');
        }else{
            return redirect('home')->with('error','Admin Creation Failed');
        }
    } 
}
