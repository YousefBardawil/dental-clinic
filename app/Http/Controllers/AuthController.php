<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Client;
use App\Models\Dentist;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{

    public function loginAs(Request $request){
        $admins = Auth::guest('admin');
        $dentists = Auth::guest('dentist');
        $clients = Auth::guest('client');
        return response()->view('cms.auth.loginas' ,compact('admins' , 'dentists' ,'clients'));
    }


    public function showlogin(Request $request ,$guard ){

        return response()->view('cms.auth.login',compact('guard') );
      }



    public function login(Request $request){
        $validator = Validator($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credintial=[
            'email' => $request->get('email'),
            'password' => $request->get('password'),

        ];

        if(!$validator->fails()){

            if(Auth::guard($request->get('guard'))->attempt($credintial, $request->get('remember'))){

                return response()->json(['icon'=>'success', 'title' =>'login is successfully'], 200);
            }else{
                return response()->json(['icon'=>'error', 'title' =>'login is failed'], 400);
            }
        }
        else{

            return response()->json([ 'message' => $validator->getMessageBag()->first()],400);
        }
     }



     public function logout(Request $request){


        if(auth('admin')->check()){
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
        }elseif(auth('dentist')->check()){
            Auth::guard('dentist')->logout();
            $request->session()->invalidate();
        }else{
            Auth::guard('client')->logout();
            $request->session()->invalidate();
        }

          return redirect()->route('view.loginas');

     }

     public function editProfile(){

        if(auth('dentist')->check()){
            $dentists = Dentist::findOrFail(Auth::guard('dentist')->id());
            $cities = City::all();
            return response()->view('cms.auth.dentisteditprofile', compact('dentists' , 'cities'));
        }elseif(auth('admin')->check()){
            $admins = Admin::findOrFail(Auth::guard('admin')->id());
            $roles = Role::where('guard_name' ,'admin')->get();
            return response()->view('cms.auth.admineditprofile',compact('roles','admins'));

        }else{
            $clients = Client::findOrFail(Auth::guard('client')->id());
            $cities = City::all();
            return response()->view('cms.auth.clienteditprofile', compact('clients' , 'cities'));
        }


       }

            public function registerAs(){

                return response()->view('cms.auth.registeras');
            }

            public function showregisterAdmin(){

                $roles = Role::where('guard_name' ,'admin')->get();
                return response()->view('cms.auth.registerAsAdmin',compact('roles'));
            }



            public function registerAdmin(Request $request){
                $validator = Validator($request->all(),[

                ]);

                if(!$validator->fails()){

                    $admins= new Admin();
                    $admins->name = $request->get('name');
                    $admins->email = $request->get('email');
                    $roles = Role::findOrFail($request->get('role_id'));
                    $admins->assignRole($roles->name);
                    $admins->password = Hash::make($request->get('password')) ;
                    $isSaved = $admins->save();

                    if($isSaved){

                        return response()->json(['icon'=>'success' , 'title' => 'Register successfully' ] , 200);
                    }else {

                        return response()->json(['icon'=>'error' , 'title' => 'Register Failed' ] , 400);

                    };

                } else {

                    return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
                }
            }

            public function showRegisterDentist(){
                $cities =City::all();
                $roles = Role::where('guard_name' ,'dentist')->get();
                return response()->view('cms.auth.registerAsDentist',compact('cities','roles'));
            }

            public function registerDentist(Request $request){
                $validator = Validator($request->all(),[
                    'name' => 'required|String|min:3|max:20',

                   ]);

                   if(!$validator->fails()){
                       $dentists= new Dentist();
                       $dentists->email = $request->get('email');
                       $dentists->name = $request->get('name');
                       $dentists->password= Hash::make($request->get('password')) ;
                       $isSaved = $dentists->save();

                       if($isSaved){

                        $users= new User();
                        $roles = Role::findOrFail($request->get('role_id'));
                        $dentists->assignRole($roles->name);
                        $users->city_id = $request->get('city_id');
                        $users->actor()->associate($dentists);

                        $isSaved = $users->save();
                         return response()->json(['icon'=>'success' , 'title' => $isSaved ? 'created succesfully' : 'created failed' ] , $isSaved ? 200 : 400);
                       }
                       else {

                        return response()->json(['icon'=>'error' , 'title' => 'created failed' ] , 400);

                    }

                   }
                   else{

                       return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
                   }
            }

            public function showregisterClient(){

                $roles = Role::where('guard_name' ,'client')->get();
                $cities =City::all();

                return response()->view('cms.auth.registerAsClient',compact('roles','cities'));
            }


            public function registerClient(Request $request){
                $validator = Validator($request->all(),[
                    'name' => 'required|String|min:3|max:20',

                   ]);

                   if(!$validator->fails()){
                       $clients= new Client();
                       $clients->email = $request->get('email');
                       $clients->name = $request->get('name');
                       $clients->password= Hash::make($request->get('password')) ;
                       $isSaved = $clients->save();

                       if($isSaved){

                        $users= new User();
                        $roles = Role::findOrFail($request->get('role_id'));
                        $clients->assignRole($roles->name);
                        $users->city_id = $request->get('city_id');
                        $users->actor()->associate($clients);

                        $isSaved = $users->save();
                         return response()->json(['icon'=>'success' , 'title' => $isSaved ? 'created succesfully' : 'created failed' ] , $isSaved ? 200 : 400);
                       }
                       else {

                        return response()->json(['icon'=>'error' , 'title' => 'created failed' ] , 400);

                    }

                   }
                   else{

                       return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
                   }
            }

}
