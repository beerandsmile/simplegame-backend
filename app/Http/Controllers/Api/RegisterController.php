<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class RegisterController extends Controller
{
    private $request;
    private $user;

    public function __construct(Request $request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function register()
    {
        $response = [
            'status' => '',
            'messages' => [],
            'data' => [],
        ];

        $validator = Validator::make($this->request->all(), [
            'name' => 'required|unique:users|min:3',
            'email' => 'required|unique:users',
        ]);

        if ($validator->fails()) {
            $response['status'] = 'error';
            $response['messages'] = $validator->errors();

            return $response;
        }

        $this->user->name = $this->request->name;
        $this->user->email = $this->request->email;
        $this->user->password = Hash::make($this->request->password);
        $this->user->events = json_encode(['personal' => Hash::make($this->request->email)]);

        if ($this->user->save()) {
            $response['status'] = 'success';
            $response['messages']['success'] = 'You successefull registered';

            return $response;
        }
    }
}
