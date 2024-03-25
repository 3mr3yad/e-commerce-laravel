<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "password" => "required|min:8|confirmed",
        ]);

        // check
        if ($validator->fails()) {
            return response()->json([
                "msg" => $validator->errors()->first()
            ], 401);
        }

        //password hash
        $password = bcrypt($request->password);
        $access_token = Str::random(64);
        // Create
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $password,
            "access_token" => $access_token
        ]);
        // msg
        return response()->json([
            "success" => "registration successful",
            "access_token" => $access_token
        ], 201);
    }

    public function login(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            "email" => "required|email|max:255",
            "password" => "required|min:8",
        ]);

        // check
        if ($validator->fails()) {
            return response()->json([
                "msg" => $validator->errors()->first()
            ], 300);
        }

        // check (email , password)
        $user = User::where("email", $request->email)->first();

        if ($user !== null) {
            //check password
            $oldPassword = $user->password;
            $access_token = Str::random(64);
            $isVerified =  Hash::check($request->password, $oldPassword);
            if ($isVerified) {
                // login (update access_token)
                $user->update([
                    "access_token" => $access_token
                ]);
                return response()->json([
                    "msg" => "You are logged in ",
                    "access_token" => $access_token
                ], 201);
            } else {
                return response()->json([
                    "msg" => "Credintal password not verified"
                ], 404);
            }
        } else {
            return response()->json([
                "msg" => "This account does not exist"
            ], 404);
        }



        //msg
    }

    public function logout(Request $request)
    {
        //access_token
        // $access_token = $request->header("access_token");
        $access_token = $request->bearerToken();
        if ($access_token !== null) {
            $user = User::where("access_token", $access_token)->first();
            if ($user !== null) {
                //update to null
                $user->update([
                    "access_token" => null
                ]);
                return response()->json([
                    "success" => "You logged out successfully"
                ], 200);
            } else {
                return response()->json([
                    "msg" => "Access token not Correct "
                ], 404);
            }
        } else {
            return response()->json([
                "msg" => "Access token not available "
            ], 404);
        }
    }
}
