<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UserController extends BaseController
{
        //Show login page
        public function login(){
                return view('pages.login',$this->data);
        }
        //Show register page
        public function register(){
            return view('pages.register',$this->data);
        }

        //Register function
        public function registerUser(Request $request){
                
                $fName=$request->input('fName');
                $lName=$request->input('lName');
                $email=$request->input('email');
                $password=$request->input('password');
                $role_id=$request->input('role_id');
                $checkMailExists=User::where('mail',$email)->get();

                //In case Js regExp is bypassed
                $validated=$request->validate([
                        'fName'=>'required|regex:/^[A-Z][a-z]{1,10}$/',
                        'lName'=>'required|regex:/^[A-Z][a-z]{1,30}(\s[A-Z][a-z]{2,10})?$/',
                        'email'=>'required|regex:/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9-]+\.[a-z]+(\.[a-z]+)?$/',
                        'password'=>'required|regex:/^[A-z0-9.-_]+$/',
                        'role_id'=>'required|Integer|max:1'
                ]);

                if($validated && $checkMailExists->isEmpty()){
                        User::create([
                                'firstName'=>$fName,
                                'lastName'=>$lName,
                                'mail'=>$email,
                                'password'=>Hash::make($password),
                                'role_id'=>$role_id,
                        ]);

                        

                        return "You have been registered";

                }
                else{
                        return "Mail already in use";
                }
        }

        //Login function
        public function loginUser(Request $request){
                
                $mail=$request->input("email");
                $password=$request->input("password");

                $user=User::where('mail',$mail)->get();

                if($user->isEmpty()){
                        return "No user found with provided mail";
                }
                else{
                        $checkPassword=Hash::check($password,$user[0]->password);

                        if($checkPassword){
                                session(["user"=>$user]);
                                return "Welcome ".$user[0]->firstName;
                        }

                        else{
                                return "Wrong password"; 
                        }

                }
                

        }

        //Logout function
        public function logout(Request $request){
                $request->session()->forget("user"); 
                return back();
        }

        public function getUsers(){
                return User::get();
        }

}
