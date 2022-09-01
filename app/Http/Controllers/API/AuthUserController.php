<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function registerAdmin(Request $request){
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

    public function registerDentist(Request $request){
        $validator = Validator($request->all(),[
             'name' => 'required',
             'email' => 'required|email|unique:admins,email',
             'password' => 'required|string|min:3',
        ]);

        if(!$validator->fails()){

            $dentists = new Dentist();
            $dentists->name = $request->get('name');
            $dentists->email = $request->get('email');
            $dentists->password = Hash::make($request->get('password')) ;

            $isSaved = $dentists->save();

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


    public function registerClient(Request $request){
        $validator = Validator($request->all(),[
             'name' => 'required',
             'email' => 'required|email|unique:admins,email',
             'password' => 'required|string|min:3',
        ]);

        if(!$validator->fails()){

            $clients = new Client();
            $clients->name = $request->get('name');
            $clients->email = $request->get('email');
            $clients->password = Hash::make($request->get('password')) ;

            $isSaved = $clients->save();

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

    public function loginAdmin(Request $request){

        $validator = Validator($request->all() ,[
            'email' => 'required|email' ,
            'password' => 'required|string',
        ]);

        if(! $validator->fails()){
            $admins = Admin::where('email' , '=' , $request->get('email'))->first();
            if(Hash::check($request->get('password') , $admins->password)){
                $token = $admins->createToken('admin-api');
                $admins->setAttribute('token' , $token->accessToken);
                return $token;
                return response()->json([
                    'status' => true ,
                    'message' => '  تم تسجيل الدخول بنجاح'
                ] , 200);
            }
            else{
                return response()->json([
                    'status' => false ,
                    'message' => '  فشل تسجيل الدخول '
                ] , 400);
            }
        }
        else{
            return response()->json([
                'status' => false ,
                'message' => $validator-> getMessageBag()->first()
            ], 400);

        }
    }

    public function loginDentist(Request $request){

        $validator = Validator($request->all() ,[
            'email' => 'required|email' ,
            'password' => 'required|string',
        ]);

        if(! $validator->fails()){
            $dentists = Dentist::where('email' , '=' , $request->get('email'))->first();
            if(Hash::check($request->get('password') , $dentists->password)){
                $token = $dentists->createToken('dentist-api');
                $dentists->setAttribute('token' , $token->accessToken);
                return $token;
                return response()->json([
                    'status' => true ,
                    'message' => '  تم تسجيل الدخول بنجاح'
                ] , 200);
            }
            else{
                return response()->json([
                    'status' => false ,
                    'message' => '  فشل تسجيل الدخول '
                ] , 400);
            }
        }
        else{
            return response()->json([
                'status' => false ,
                'message' => $validator-> getMessageBag()->first()
            ], 400);

        }
    }

    public function loginClient(Request $request){

        $validator = Validator($request->all() ,[
            'email' => 'required|email' ,
            'password' => 'required|string',
        ]);

        if(! $validator->fails()){
            $clients = Client::where('email' , '=' , $request->get('email'))->first();
            if(Hash::check($request->get('password') , $clients->password)){
                $token = $clients->createToken('client-api');
                $clients->setAttribute('token' , $token->accessToken);
                return $token;
                return response()->json([
                    'status' => true ,
                    'message' => '  تم تسجيل الدخول بنجاح'
                ] , 200);
            }
            else{
                return response()->json([
                    'status' => false ,
                    'message' => '  فشل تسجيل الدخول '
                ] , 400);
            }
        }
        else{
            return response()->json([
                'status' => false ,
                'message' => $validator-> getMessageBag()->first()
            ], 400);

        }
    }




    public function logoutAdmin(Request $request){


        $token = $request->user('admin-api')->token();
        $revoked = $token->revoke();

        return response()->json([
            'status' => $revoked ,
            'message' => $revoked ? 'تم تسجيل الخروج بنجاح' : ' فشلت عملية تسجيل الخروج'
        ]);

    }

    public function logoutDentist(Request $request){

        $token = $request->user('dentist-api')->token();
        $revoked = $token->revoke();
        return response()->json([
            'status' => $revoked ,
            'message' => $revoked ? 'تم تسجيل الخروج بنجاح' : ' فشلت عملية تسجيل الخروج'
        ]);

    }

    public function logoutClient(Request $request){

        $token = $request->user('client-api')->token();
        $revoked = $token->revoke();
        return response()->json([
            'status' => $revoked ,
            'message' => $revoked ? 'تم تسجيل الخروج بنجاح' : ' فشلت عملية تسجيل الخروج'
        ]);

    }

    public function resetPasswordAdmin(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email|exists:admins,email' ,
            'authCode' => 'required|digits:4',
            'password' => 'required|string|min:3|confirmed'
        ]);

            if (! $validator->fails()){
                $admins = Admin::where('email' , '=' , $request->get('email'))->first();
                if(Hash::check($request->get('authCode') , $admins->authCode)){
                    $admins->password = Hash::make($request->get('password'));
                    $admins->authCode = null ;

                    $isSaved = $admins->save();
                    return response()->json([
                        'status' => $isSaved ,
                        'message' => $isSaved ? 'تم انشاء كلمة مرور جديدة' : 'فشلت عملية انشاء كلمة مرور جديدة',
                    ] , $isSaved ? 200 : 400);

                }
            }
            else{
                return response()->json([
                    'message' => $validator->getMessageBag()->first()
                ] , 400);
            }


    }
    public function forgetPassword(Request $request){


    }
}
