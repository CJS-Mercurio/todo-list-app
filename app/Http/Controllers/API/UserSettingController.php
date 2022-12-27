<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingController extends Controller
{
    public function __construct() {

        $this->middleware('auth:api');
    }

    public function updateProfile(Request $request) {

        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|string|max:120|unique:users,email,' .$user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json([
            'message' => "Profile updated successfully.",
            'user' => $user
        ], 200);
    }

    public function updatePassword(Request $request) {

        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8'
        ]);

        $user = Auth::user();

        // Check that the old password provided by the user is correct
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'error' => "The provided old password is incorrect."
            ], 422);
        }

        // Hash the new password and save to database
        $hashedPassword = Hash::make($request->password);
        $user->password = $hashedPassword;
        $user->save();

        return response()->json([
            'message' => "Password updated successfully.",
            'user' => $user
        ], 200);
    }
}
