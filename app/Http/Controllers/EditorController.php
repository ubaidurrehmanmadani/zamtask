<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserNotification;
use App\Models\User;

class EditorController extends Controller
{
     public function editorHome(){
        return view('editorHome');
    }


    public function addEditor(Request $request)
    {        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => app('hash')->make('123456'),
            'role' => User::EDITOR_ROLE
        ]);

        $user->notify(new UserNotification(new User));

        if($user){
            return redirect('home')->with('success','Editor Created Sucessfully');
        }else{
            return redirect('home')->with('error','Editor Creation Failed');
        }
    }
}
