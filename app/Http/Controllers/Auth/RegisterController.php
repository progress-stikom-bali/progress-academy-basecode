<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

// Import Models
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $req){
        return view('auth.register');
    }

    public function registerUser(Request $req){
        try {
            $validatedData = $req->validate([
                'name' => 'required|string|max:255',
                'email' => 'string|required|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role_id' => 'required',
            ]);
            // Hash the password
            Hash::make($validatedData['password']);

            // Register the user
            $user = User::create($validatedData);

            // Sign the user in
            auth()->login($user);

            // Redirect to the home page
            return redirect()->route('member.dashboard')->with('success', 'Welcome to PROGRESS BOOK!');
        } catch (ValidationException $e) {
            // Tangani error validasi
            return back()->withErrors($e->validator)->withInput();
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Failed to register your Account!' . $e);
        }
    }
}
