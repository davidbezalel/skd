<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Citizen as CitizenModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Citizen extends Controller
{
    public function register(Request $request)
    {
        $_validator = Validator::make($request->all(), [
            'nik' => 'required|min:16|max:16|unique:citizen',
            'nokk' => 'required|min:16|max:16',
            'name' => 'required',
            'phonenumber' => 'required|max:14',
            'address' => 'required',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password'
        ]);

        if ($_validator->fails()) {
            $this->apiresponse->code = 400;
            $this->apiresponse->message = $_validator->messages()->first();
            return response()->json($this->apiresponse);
        }

        try {
            $_data = $request->all();
            $_data['password'] = Hash::make($request->password);
            CitizenModel::create($_data);
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
            'nik' => 'required|max:16|min:16',
            'password' => 'required|min:6',
        ]);

        if ($_validator->fails()) {
            $this->apiresponse->code = 400;
            $this->apiresponse->message = $_validator->messages()->first();
            return response()->json($this->apiresponse);
        }

        if ($citizen = CitizenModel::where('nik', '=', $request->nik)->get()->first()) {
            try {
                $_data = $request->only('nik', 'password');
                if (!$token = Auth::guard('citizen')->attempt($_data)) {
                    $this->apiresponse->code = 401;
                    $this->apiresponse->message = 'Password is incorrect';
                } else {

                    $this->apiresponse->code = 200;
                    $this->apiresponse->data->token = $token;
                    $this->apiresponse->data->name = $citizen->name;
                    $this->apiresponse->data->username = $citizen->nik;
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
