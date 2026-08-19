<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseTrait;

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
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

            $data = $validator->validated();

            $data['password'] = Hash::make($data['password']);

            $user = $this->userRepository->create($data);
            
            return $this->success('User created succesfully', $user, 201);
        } catch (Exception $ex) {
            return $this->error($ex->getMessage());
        }
    }

    public function show(User $user)
    {
        return $this->success(
            'User retrieved successfully',
            $user
        );
    }


    public function update(Request $request, User $user)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'contact_number' => 'required|max:20|unique:users,contact_number,' . $user->id,
                'role' => 'required|in:teacher,student',
                'status' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return $this->error(
                    'Validation failed',
                    422,
                    $validator->errors()
                );
            }

            $this->userRepository->update(
                $user,
                $validator->validated()
            );

            return $this->success(
                'User updated successfully',
                $user->fresh()
            );

        } catch (Exception $ex) {
            return $this->error($ex->getMessage());
        }
    }


    public function destroy(User $user)
    {
        try {
            $this->userRepository->delete($user);

            return $this->success(
                'User deleted successfully'
            );

        } catch (Exception $ex) {
            return $this->error($ex->getMessage());
        }
    }
}
