<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Change the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request)
    {
        // Validate incoming request
       if(!$request->password)
       {
           return response()->json(['status' => 0,'message' => 'Please send the password field'], 200);
       }
        // Get the authenticated user
        $user = Auth::user();

        // Update user's password
        $user->password = Hash::make($request->password);
        $user->save();
        // Return a success response
        return response()->json(['status' => 1,'message' => 'Password changed successfully'], 200);
    }

    public function updateStatus(Request $request)
    {
        $user = Auth::user();
        if($user)
        {
            $user->status = $request->status;
            $user->save();
            return response()->json(['status' => 1,'message' => 'User Status Updated Successfully'], 200);
        }
        return response()->json(['status' => 0,'message' => 'User Not Found'], 200);

    }
}
