<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function auth()
    {
        $response = [
            'status' => '',
            'messages' => [],
            'data' => [],
        ];

        $credentials = $this->request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where(['email' => $this->request->get('email')])->first();
            
            if (!$user->auth_token) {
                $user->auth_token = Hash::make(time() . $this->request->get('email'));
                $user->save();
            }

            $response['status'] = 'success';
            $response['data'] = $user;

            return $response;
        }

        $response['status'] = 'error';
        $response['messages'][] = 'Wrong Email or Password';
        return $response;
    }
}
