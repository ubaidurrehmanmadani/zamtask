<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Notifications\UserNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }  

    public function addUser(Request $request)
    {        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => app('hash')->make('123456'),
            'role' => User::USER_ROLE
        ]);

        $user->notify(new UserNotification(new User));

        if($user){
            return redirect('home')->with('success','User Created Sucessfully');
        }else{
            return redirect('home')->with('error','User Creation Failed');
        }
    } 
}
