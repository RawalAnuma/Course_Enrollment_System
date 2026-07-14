<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(['id', 'name', 'email', 'contact_number', 'role', 'status']);
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

        User::create($validatedData);
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

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            toastr()->error('User not found.');
            return redirect()->route('users.index');
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            toastr()->error('User not found.');
            return redirect()->route('users.index');
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'contact_number' => 'required|max:15|unique:users,contact_number,' . $user->id,
            'role' => 'required|in:teacher,student',
            'status' => 'required|boolean',
        ]);

        $user->update($validatedData);
        toastr()->success('User updated successfully!');
        return redirect()->route('users.index');
    }

    public function delete($id){
        try{
            User::where('id', $id)->delete();
            // Display a success toast with no title
            toastr()->success('User has been deleted successfully!');
        }catch(Exception $ex){
            // Display an error toast with no title
            toastr()->error('An error occurred while deleting the user.');
        }
        return redirect()->route('users.index');
        
    }
    
}
