<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreuserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller  
{
    public function index() {
        return view('user.dashboard');
    }

    public function store(StoreuserRequest $request) {
        $validateData = $request->validated();
        
        $userExisted = User::where('email', $validateData['email'])->first();
    
        if ($userExisted) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email is already taken.']);
        }
    
        $user = User::create($validateData);
         // return redirect()->route('login')->with('success', 'User created successfully');
         return response()->json(['message' => 'User berhasil ditambahkan', 'data' => $user], 201);
    
        // Auth::attempt harus dijalankan setelah user dibuat
        if (!Auth::attempt(['email' => $validateData['email'], 'password' => $validateData['password']])) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    
}
