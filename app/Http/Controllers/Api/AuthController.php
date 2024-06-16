<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * User registration
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
      $validate =  $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'course' => 'nullable|string',
            'duration_in_days' => 'nullable|string',
            'fees_amount' => 'nullable|string',
        ]);

       $userExists = User::where('email',$request->email)->exists();
       if($userExists)
       {
           return response()->json(['message' => 'User Already Registered'], 200);
       }
       $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->course = $request->course;
        $user->status = 1;
        $user->save();

        //if user is registered then assign the course
        if($user)
        {
            $course = new Course();
            $course->user_id = $user->id;
            $course->name = $request->course;
            $course->duration_in_days = $request->duration_in_days;
            $course->fees_amount = $request->fees_amount;
            $course->status = 1;
            $course->save();
        }

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    /**
     * User login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
      $validator =  $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
// Print error message if any validation failed
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // check if user is disabled
            if($user->status == 0)
            {
                return response()->json(['status' => 0,'message' => "User is disabled"], 200);
            }
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['status' => 1,'token' => $token], 200);
        }

        return response()->json(['status' => 0,'message' => "The provided credentials are incorrect"], 200);

    }
    /**
     * Get the authenticated user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(Request $request)
    {
       $user = $request->user(); // Retrieve the authenticated user

        if ($user) {
            // Return the user data as JSON response
            return response()->json(['status' => 1, 'user' => $user], 200);
        } else {
            // If no authenticated user found, return an error response
            return response()->json(['status' => 0, 'message' => 'Token is invalid or mismatched, Please send the correct token'], 401);

        }
    }


}
