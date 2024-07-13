<?php

namespace App\Http\Controllers;

//  Method
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

// Models
use App\Models\User;

class AdminController extends Controller
{
    // Function untuk halaman utama dari admin
    public function index()
    {
        // Variabel untuk menampung data user yang memiliki role admin
        $admin = User::where('role_id', 1)->get();
        // Variabel untuk data yang ada di view
        $viewData = [
            'title' => "Admin",
            'activePage' => "admin",
            // Variabel admin diberikan untuk halaman disini
            'admin' => $admin,
        ];
        // Mengembalikan view admin.admin.index dengan data yang ada di variabel viewData
        return view('admin.admin.index', $viewData);
    }

    public function create()
    {
        $viewData = [
            'title' => "Create Admin",
            'activePage' => "admin",
        ];
        return view('admin.admin.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role_id' => 'required',
            ]);
            Hash::make($validatedData['password']);
            User::create($validatedData);
            return redirect()->route('admin.admin.index')->with('success', 'User created successfully!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Failed to create user!' . $e);
        }
    }

    public function edit(string $id)
    {
        $admin = User::find($id);
        $viewData = [
            'title' => "Edit Admin",
            'activePage' => "user",
            'admin' => $admin, 
        ];
        return view('admin.admin.edit', $viewData);
    }

    public function update(Request $request, string $id)
    {
        $admin = User::find($id);
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'role_id' => 'required',
            ]);
            $admin->update($validatedData);
            return redirect()->route('admin.admin.index')->with('success', 'User updated successfully!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Failed to update user!' . $e);
        }
    }

    public function destroy(Request $request)
    {
        $admin = User::find($request->id);
        try {
            $admin->delete();
            return redirect()->route('admin.admin.index')->with('success', 'User deleted successfully!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Failed to delete user!' . $e);
        }
    }
}