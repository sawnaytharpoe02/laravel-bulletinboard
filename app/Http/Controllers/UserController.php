<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    // Lists of users screen
    public function index()
    {
        $users = User::latest()->filter(request(['search']))->paginate();
        return view('users.index', compact('users'));
    }

    // Create User Screen
    public function create()
    {
        return view('users.create');
    }

    // Create User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
            'phone' => 'nullable',
            'dob' => 'nullable',
            'address' => 'nullable',
        ]);

        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['image'] = $tmp_file ? $tmp_file->folder . '/' . $tmp_file->file : null;
        User::create($formFields);

        if($tmp_file) {
            Storage::copy('public/posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'public/posts/' . $tmp_file->folder . '/' . $tmp_file->file);
        }
        Storage::deleteDirectory('public/posts/tmp/' . $tmp_file?->folder);
        $tmp_file?->delete();

        return redirect('/users')->with('message', 'User created successfully!');
    }

    // User Edit Screen
    public function edit(User $userId)
    {
        return view('users.edit', ['user' => $userId]);
    }

    // Update User
    public function update(Request $request, User $userId)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'nullable',
            'dob' => 'nullable',
            'address' => 'nullable',
        ]);

        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        $formFields['image'] = $tmp_file ? $tmp_file->folder . '/' . $tmp_file->file : null;

        unset($formFields['password']);
        $userId->update($formFields);

        if($tmp_file) {
            Storage::copy('public/posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'public/posts/' . $tmp_file->folder . '/' . $tmp_file->file);
        }

        Storage::deleteDirectory('public/posts/tmp/' . $tmp_file?->folder);
        $tmp_file?->delete();

        return redirect('/users')->with('message', 'User updated successfully!');
    }


    // User Registration Screen
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    // User Registration
    public function submitRegistrationForm(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['image'] = $tmp_file ? $tmp_file->folder . '/' . $tmp_file->file_name : null;
        $user = User::create($formFields);

        if($tmp_file) {
            Storage::copy('posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'posts/' . $tmp_file->folder . '/' . $tmp_file->file);
        }
        Storage::deleteDirectory('posts/tmp/' . $tmp_file?->folder);
        $tmp_file?->delete();

        auth()->login($user);
        return redirect('/')->with('message', 'You are registered!');
    }


    // User Login Screen
    public function login()
    {
        return view('auth.login');
    }


    // User Login
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // User Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');
    }

    // Upload Temporary Profile
    public function tmpUpload(Request $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('public/posts/tmp/' . $folder, $file_name);

            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return '';
    }

    // Delete Temporary Upload Profile
    public function tmpDelete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if($tmp_file) {
            Storage::deleteDirectory('public/posts/tmp/'. $tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }

}
