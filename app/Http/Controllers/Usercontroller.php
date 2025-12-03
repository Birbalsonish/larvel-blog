<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
public function login(Request $request){
    $incomingdata = $request->validate([
       'loginname'=>'required',
        'loginpassword'=>'required'
    ]);  
if (auth()->attempt(['name'=>$incomingdata['loginname'], 'password'=>$incomingdata['loginpassword']])){
   $request->session()->regenerate();

}
 return redirect('/');

}





public function logout(){
    auth()->logout();
    return redirect('/');
}

 public function register(Request $request){
    $incomingdata = $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required'
    ]);  

    $incomingdata['password'] = bcrypt($incomingdata['password']);
    $user = User::create($incomingdata);
    auth()->login($user);
    return redirect('/');  
}
}

