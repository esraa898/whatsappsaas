<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class LoginController extends Controller
{
     
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
       $user = User::where('username',$request->username)->first();

     if(Auth::attempt($request->only(['username','password']))){
        
        if($user->role == 'admin'){
            return redirect('/dashboard');
        }

        return redirect('/home');
     }
     
     return back()->with('alert',[
         'type' => 'danger',
         'msg' => 'There is wrong in your credentials!'
     ]);
    }
}
