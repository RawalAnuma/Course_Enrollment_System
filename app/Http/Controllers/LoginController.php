<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('users.index');
        }
        return view('auth.login');
    }

    public function store(Request $request){
        try{
            $checkEmail = User::where('email', $request->email)->first();
            if(!$checkEmail){
                toastr()->error('Email not found. Please check your email or register.');
                return redirect()->back();
            }

            if(Auth::attempt($request->only('email', 'password'))){
                toastr()->success('Login successful.');
                return redirect()->route('home');
            } else{
                toastr()->error('Invalid credentials. Please try again.');
                return redirect()->back();
            }
        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        toastr()->success('Logout successful.');
        return redirect()->route('auth.form');

    }

    public function profile(){
        return view('auth.profile');
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'contact_number' => 'required|max:15',
            //'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;

        // if ($request->hasFile('image')) {

        //     if ($user->image && Storage::disk('public')->exists($user->image)) {
        //         Storage::disk('public')->delete($user->image);
        //     }

        //     $user->image = $request->file('image')->store('profiles', 'public');
        // }

        $user->save();

        toastr()->success('Profile updated successfully.');

        return redirect()->back();
    }


        public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            toastr()->error('Current password is incorrect.');
            return back();
        }
        if (Hash::check($request->password, $user->password)) {
            toastr()->error('New password cannot be the same as the current password.');
            return back();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        toastr()->success('Password changed successfully.');

        return back();
    }
}

