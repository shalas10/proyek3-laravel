<?php

namespace app\Http\Controllers\api;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller{

    public function index()
    {
        $users = User::get();
        return response()->json($users);
    }

    // public function login(Request $req)
    // {
    //     $this->validate($req, [
    //     "email" => "required",
    //     "password" => "required"
    //     ]);

    //     $user = User::where("email", $req->email)->first();

    //     if (!$user) {
    //         return response()->json(['message' => 'Login failed'], 401);
    //     }

    //     $token = bin2hex(random_bytes(40));
    //     $user->update([
    //         'token' => $token
    //     ]);

    //     return response()->json($user);
    // }
    public function login(Request $req)
    {
        // validate inputs
        $rules = [
            'level' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];
        $req->validate($rules);
        // find user email in users table
        $user = User::where('email', $req->email)->where('level', $req->level)->first();
        
        if ($user && Hash::check($req->password, $user->password)) {
            $response = ['user' => $user];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Incorrect email or password'];
        return response()->json($response, 400);
    }
}