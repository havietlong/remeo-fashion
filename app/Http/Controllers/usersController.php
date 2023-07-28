<?php

namespace App\Http\Controllers;

use App\Models\users;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class usersController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('user') != null) {
            $userInfo = session('user', []);
            return response()->json([
                'user' => $userInfo
            ]);
        } else if (session('admin') != null) {
            $adminInfo = session('admin', []);
            return response()->json([
                'admin' => $adminInfo
            ]);
        } else {
            $staffInfo = session('staff', []);
            return response()->json([
                'staff' => $staffInfo
            ]);
        }
    }


    public function modifyStaff(Request $request, string $id)
    {
        $staff = users::find($id);
        if ($staff) {
            if ($staff) {
                // Update the product data with the data from the request
                $staff->update($request->all());
                return response()->json(['message' => 'Updated product']);
            } else {
                return response()->json(['message' => 'Product not found'], 404);
            }
        }
    }

    public function staffIndex()
    {
        $staff = users::where('role_id', 2)
            ->get();
        return $staff;
    }

    public function validateLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Retrieve the user record based on the provided email
        $user = users::where('email', $credentials['email'])->first();
        $role = $user->role_id;
        if (!$user) {
            // Invalid email or user not found
            return response()->json(['message' => 'Invalid email'], 401);
        } else {
            // Compare the provided password with the hashed password stored in the user record
            if ($credentials['password'] !== $user->password) {
                // Invalid password
                return response()->json(['message' => 'Invalid password'], 401);
            } else {
                 
                if ($role == 3 || $role === '3') {
                    $this->createAdminSession($user);
                    // Login successful
                    return response()->json(['message' => 'Login successful as Admin'], 200);
                }else if ($role == 2 || $role === '2') {
                    $this->createStaffSession($user);
                    return response()->json(['message' => 'Login successful as Staff'], 200);
                }else {
                    $this->createUserSession($user);
                    // Login successful
                    return response()->json(['message' => 'Login successful'], 200);
                }
            }
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
    public function createStaffSession($user)
    {
        session(['staff' => $user]);
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
            $newUser = new users();
            $newUser->name = $credentials['name'];
            $newUser->email = $credentials['email'];
            $newUser->password = $credentials['password'];
            $newUser->role_id = 1;
            $newUser->save();

            return response()->json(['message' => 'Register successful'], 200);
        } else {
            return response()->json(['message' => 'passwords not matched'], 401);
        }
    }

    public function addNewEmployee(Request $request)
    {

        $newUser = new users();
        $newUser->name = null;
        $newUser->email = null;
        $newUser->password = null;
        $newUser->role_id = 2;
        $newUser->save();

        return response()->json(['message' => 'Added employee successful'], 200);
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
        $existingStaff = users::find($id);
        switch ($existingStaff) {
            case true:
                $existingStaff->delete();
                return "Đã xóa sản phẩm";
            default:
                return "Không tìm thấy sản phẩm";
        }
    }

    public function destroySessionUser(Request $request)
    {
        $request->session('user')->flush();
        return Redirect::route('home')->with('success', 'Session destroyed successfully.');
    }
}
