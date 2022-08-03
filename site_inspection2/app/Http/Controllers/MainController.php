<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\inspections;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function register()
    {
        return view('auth.register');
    }
    function save(Request $request)
    {

        //Validate requests
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'role' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8'
        ]);

        if ($request->password != $request->cpassword) {
            return back()->with('fail', 'Password and Confirm Password is not matching');
        }
        //Insert data into database
        $user = new User;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return back()->with('success', 'New User has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }


    function InspectionSave(Request $request)
    {

        //Validate requests
        $request->validate([
            'client_name' => 'required',
            'site_address' => 'required',
            'place' => 'required',
            'price' => 'required',
            'inspector' => 'required'
        ]);

        //Insert data into database
        $inspection = new inspections;
        $inspection->date = $request->date;
        $inspection->client_name = $request->client_name;
        $inspection->client_representative = $request->client_representative;
        $inspection->site_address = $request->site_address;
        $inspection->equipment = $request->equipment;
        $inspection->consumablese = $request->consumablese;
        $inspection->qoute = $request->qoute;
        $inspection->place = $request->place;
        $inspection->Contact = $request->Contact;
        $inspection->expire = $request->expire;
        $inspection->contractors = $request->contractors;
        $inspection->price = $request->price;
        $inspection->inspector = $request->inspector;
        $save = $inspection->save();

        if ($save) {
            return back()->with('success', 'New Inspection has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }

    function check(Request $request)
    {
        //Validate requestss
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        $userInfo = User::where('email', '=', $request->email)->where('role', '=', $request->role)->first();

        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                $request->session()->put('LoggedRole', $userInfo->role);

                return redirect('/dashboard');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    //Manager

    function dashboard()
    {
        $data = ['Inspectors' => User::where('role', '=', 'site_inspector')->get()];
        if (session('LoggedRole') === "manager") {
            return view('manager.dashboard', $data);
        } else {
            return view('inspector.dashboard', $data);
        }
    }

    function RegisterInspector()
    {
        if (session('LoggedRole') === "manager") {
            return view('manager.register');
        }
    }

    function AllInspections()
    {
        $data = ['AllInspections' => inspections::get()];
        if (session('LoggedRole') === "manager") {
            return view('manager.inspections', $data);
        }else{
            return view('inspector.inspections', $data);
        }
    }


    //Inspector
    function FormInspector()
    {
        return view('inspector.form');
    }
}
