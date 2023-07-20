<?php

namespace App\Http\Controllers;

use App\Models\customers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userInfo = session('user', []);
        return response()->json([
            'user' => $userInfo
        ]);
    }

    public function validateLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Retrieve the user record based on the provided email
        $user = customers::where('email', $credentials['email'])->first();
        $role = $user->role_id;
        if (!$user) {
            // Invalid email or user not found
            return response()->json(['message' => 'Invalid email'], 401);
        }

        // Compare the provided password with the hashed password stored in the user record
        if ($credentials['password'] !== $user->password){
            // Invalid password
            return response()->json(['message' => 'Invalid password'], 401);
        }

        if ($role == 2 || $role === '2') {
            return response()->json(['message' => 'Login successful as Admin'], 200);
            
        $this->createAdminSession($user);
        } else {
            
            // Login successful
            return response()->json(['message' => 'Login successful'], 200);
            
        $this->createUserSession($user);
        }
    }


    public function createUserSession($user)
    {
        session(['user' => $user]);
    }
    public function createAdminSession($user)
    {
        session(['admin' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password', 'repeatPassword');
        if ($credentials['password'] == $credentials['repeatPassword']) {
            $newUser = new customers();
            $newUser->name = $credentials['name'];
            $newUser->email = $credentials['email'];
            $newUser->password = $credentials['password'];
            $newUser->role_id = 2;
            $newUser->save();

            return response()->json(['message' => 'Register successful'], 200);
        } else {
            return response()->json(['message' => 'passwords not matched'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroySessionUser(Request $request)
    {
        $request->session('user')->flush();
        return Redirect::route('home')->with('success', 'Session destroyed successfully.');
    }
}
