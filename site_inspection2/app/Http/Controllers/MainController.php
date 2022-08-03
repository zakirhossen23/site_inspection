<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'fullname'=>'required',
            'email'=>'required|email|unique:users',
            'gender'=>'required',
            'role'=>'required',
            'password'=>'required|min:8',
            'cpassword'=>'required|min:8'
        ]);

        if($request->password != $request->cpassword){
            return back()->with('fail','Password and Confirm Password is not matching');
         }
         //Insert data into database
         $user = new User;
         $user->fullname = $request->fullname;
         $user->email = $request->email;
         $user->gender = $request->gender;
         $user->role = $request->role;
         $user->password = Hash::make($request->password);
         $save = $user->save();

         if($save){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    function check(Request $request){
        //Validate requestss
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:8',
             'role'=>'required'
        ]);

        $userInfo = User::where('email','=', $request->email)->where('role','=', $request->role)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                $request->session()->put('LoggedRole', $userInfo->role);
                
                return redirect('/dashboard');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('inspector.dashboard', $data);
    }

}
