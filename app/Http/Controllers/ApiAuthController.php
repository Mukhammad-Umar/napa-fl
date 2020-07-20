<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return error_response($validator->errors(),'Validation Error');
        }

        $login = $request->input('login');
        $password = $request->input('password');

        $user = User::query()->where('email', $login)->orWhere('username', $login)->first();
        if ($user) {
            if(Hash::check($password, $user->password)){

                $token = Str::random('80');
                $user->api_token = $token;
                $user->save();

                return success_response([
                    'api_token' => $token
                ]);
            }
        }

        return error_response([
            'code' => 1000,
            'message' => 'User not found with this credentials'
        ]);
    }
}
