<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ResponseTrait;

    public function store(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return $this->error('This user doesnt exist in our system!');
            }

            if (Auth::attempt($request->only('email', 'password'))) {
                $token = $user->createToken('user_token')->accessToken;
                $user->token = $token;
                return $this->success('User created succesfully', $user, 201);
            } else {
                return $this->error('Wrong Credentials!');
            }
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        // Auth::logout();
        $request->user()->tokens()->delete(); // Auth::User()
        return view('auth.login');
    }
}