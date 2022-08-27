<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function register(Request $request){
        $validator = Validator($request->all(),[
             'name' => 'required',
             'email' => 'required|email|unique:admins,email',
             'password' => 'required|string|min:3',
        ]);

        if(!$validator->fails()){
            $admins = new Admin();
            $admins->name = $request->get('name');
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password')) ;

            $isSaved = $admins->save();

            if($isSaved){
                return response()->json([
                'status' => true,
                'message' => 'you have registered',
                ],200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'registered failed',
                    ],400);
            }

        }else{
            return response()->json([
             'status'=> false,
             'message'=> $validator->getMessageBag()->first(),
            ], 400);

        }

    }

    public function login(Request $request){

    }
    public function logout(Request $request){


    }
    public function resetPassword(Request $request){


    }
    public function forgetPassword(Request $request){


    }
}
