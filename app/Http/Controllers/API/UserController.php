<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseTrait;
   public function index()
   {
       $users = User::get();
       return $this->success('Users retrieved successfully', $users);
   }

    // public function create()
    // {
    //     return view('users.create');
    // }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'contact_number' => 'required|max:20|unique:users,contact_number',
                'role' => 'required|string',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $this->error('Validation failed', 422, $validator->errors());
            }

            $user = User::create($validator->validated());
            try{
                Mail::to($user->email)->send(new WelcomeEmail([
                'name' => $user->name,
            ]));
            } catch(Exception $ex){
                Log:debug($ex->getMessage());
            }
            return $this->success('User created succesfully', $user, 201);
        } catch (Exception $ex) {
            return $this->error($ex->getMessage());
        }
    }
}
