<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    use HasFactory, Notifiable;
    public function index()
    {
        $title = 'Users';
        $users = User::all();

        return view('admin.users', compact('title'), ['users' => $users]);
    }
    public function create()
    {
        $title = 'Add User';
        return view('admin.addUser', compact('title'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'first-name' => 'required|string|max:255',
            'user-name' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user record
        $user = new User();
        $user->name = $request->input('first-name');
        $user->username = $request->input('user-name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->active = $request->boolean('active');
        $user->save();

        // Optionally, you can return a response or redirect to another page
        return redirect()->route('users.index')->with('success', 'Done.');
    }

    public function show(string $id)
    {

        // $user=User::findOrFail($id);
        // return view('editUser', compact('user'));

    }

    public function edit(string $id)
    {
        $title = 'Edit User';
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user','title'));
    }

    public function update(Request $request, string $id)
    {
         // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'userName' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'required|string|min:8',
        'active' => 'boolean',

    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user's information
    $user->name = $request->input('name');
    $user->userName = $request->input('userName');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->active = $request->boolean('active');
    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


}