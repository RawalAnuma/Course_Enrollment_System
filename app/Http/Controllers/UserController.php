<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'required|max:15|unique:users,contact_number',
            'role' => 'required|in:teacher,student',
            'status' => 'required|boolean',
            'password' => 'required|min:8',
        ]);

        $this->userRepository->create($validatedData);
        toastr()->success('User created successfully!');
        return redirect()->route('users.index');
        }catch(Exception $ex){
            toastr()->error($ex->getMessage());
            return redirect()->back();
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));

    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'contact_number' => 'required|max:15|unique:users,contact_number,' . $user->id,
            'role' => 'required|in:teacher,student',
            'status' => 'required|boolean',
        ]);

         $this->userRepository->update($user,$validatedData);
        toastr()->success('User updated successfully!');
        return redirect()->route('users.index');
    }

    public function destroy(User $user){
        try{
            $this->userRepository->delete($user);
            // Display a success toast with no title
            toastr()->success('User has been deleted successfully!');
        }catch(Exception $ex){
            // Display an error toast with no title
            toastr()->error('An error occurred while deleting the user.');
        }
        return redirect()->route('users.index');
        
    }
    
}
