<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin as AdminModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Admin extends Controller
{
    public function register(Request $request)
    {
        if (!$this->isPost()) {
            return view('auth.register');
        }

        $_validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|max:8|unique:admin',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password'
        ]);

        if ($_validator->fails()) {
            $this->apiresponse->code = 400;
            $this->apiresponse->message = $_validator->messages()->first();
            return response()->json($this->apiresponse);
        }

        try {
            $_data = array(
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            );
            AdminModel::create($_data);
        } catch (\Exception $e) {
            $this->apiresponse->code = 500;
            $this->apiresponse->message = $e->getMessage();
            return response()->json($this->apiresponse);
        }

        $this->apiresponse->code = 201;
        $this->apiresponse->message = 'Data Inserted';
        return response()->json($this->apiresponse);
    }

    public function login(Request $request)
    {
        $_validator = Validator::make($request->all(), [
            'username' => 'required|max:8',
            'password' => 'required|min:6',
        ]);

        if ($_validator->fails()) {
            $this->apiresponse->code = 400;
            $this->apiresponse->message = $_validator->messages()->first();
            return response()->json($this->apiresponse);
        }

        if ($admin = AdminModel::where('username', '=', $request->username)->get()->first()) {
            try {
                $_data = $request->only('username', 'password');
                if (!$token = Auth::guard('api')->attempt($_data)) {
                    $this->apiresponse->code = 401;
                    $this->apiresponse->message = 'Password is incorrect';
                } else {

                    $this->apiresponse->code = 200;
                    $this->apiresponse->data->token = $token;
                    $this->apiresponse->data->name = $admin->name;
                    $this->apiresponse->data->username = $admin->username;
                }
            } catch (JWTException $e) {
                $this->apiresponse->code = 500;
                $this->apiresponse->message = 'Failed to create token';
            }

        } else {
            $this->apiresponse->code = 401;
            $this->apiresponse->message = 'Username is not registered';
        }

        return response()->json($this->apiresponse);
    }

    public function testing(Request $request) {
        $this->apiresponse->code = 200;
        $this->apiresponse->data = Auth::guard('api')->user()->id;
        return response()->json($this->apiresponse);
    }
}
