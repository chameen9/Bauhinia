<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Rules\PasswordChecker;
use Validator;
use Auth;
use DB;

class customercontroller extends Controller
{

    function checksignin(Request $request){
        
        $this->validate($request, [
            'email'=>['required','email','string','max:100','min:5'],
            //'password'=>['string', new PasswordChecker()], //pasword checker externel rule
        ]);

        $reqemail = $request->input('email');
        $reqpassword = $request->input('password');
        $gotemail = DB::Table('customers')->where('email',$reqemail)->value('email');
        $gotpassword = DB::Table('customers')->where('email',$reqemail)->value('password');
        $gotname = DB::Table('customers')->where('email',$reqemail)->value('name');
    
        if($gotemail==$reqemail){
            if($gotpassword==$reqpassword){
                return view('home',['name'=>$gotname]); //send name to the view     return customer view
                    
            }
            else{
                return back()->with('error','Invalid Password. Try again !');
            }
        }
        else{
            return back()->with('error','Unkonown user !');
        }
    }

       

    function signupascustomer(Request $request){
        $Customer = new Customer;

        $this->validate($request,[
            'email'=>['email','string','max:100','unique:customers'],
            'name'=>['string','max:100','min:2'],
            'password'=>['string', new PasswordChecker()],
            'delivery_address'=>['string','max:250','min:5'],
            'confirm_password'=>['string', 'same:password'],
            'primary_contact_number'=>['numeric','min:10'],
            'secondary_contact_number'=>['numeric','min:10','different:primary_contact_number'],
        ]);
        
        $Customer->email=$request->email;
        $Customer->name=$request->name;
        $Customer->password=$request->password;
        $Customer->delivery_address=$request->delivery_address;
        $Customer->primary_contact_number=$request->primary_contact_number;
        $Customer->secondary_contact_number=$request->secondary_contact_number;
        $Customer->save();
        return back()->with('message','Sign up successful.');
    }

    function editprofile(Request $request){ //finish this
        $User = new User;

        $reqemail = $request->input('email');
        $reqpassword = $request->input('password');
        $gotemail = DB::Table('users')->where('email',$reqemail)->value('email');
        $gotpassword = DB::Table('users')->where('email',$reqemail)->value('password');
        $gotauth = DB::Table('users')->where('email',$reqemail)->value('auth_level');
        $gotname = DB::Table('users')->where('email',$reqemail)->value('name');
    }

    /*function checkLogin(Request $request){
        
        $this->validate($request, [
            'email'=>['required','email','string','max:100'],
            'password'=>['required','string', new PasswordChecker()],
        ]);

        $email = $request->input('email');
        $results = DB::table('users')->where('email',$email)->get();
        $username = DB::Table('users')->where('email',$email)->value('name');

        if($results[0]->email == $request->input('email') && $results[0]->password == $request->input('password')){
            if($results[0]->auth_level == 0){
                return view('home',['username'=>$username]); //send name to the view
            }
            else{
                return back()->with('error','You have try to logged in as a Customer !');
            }
        }
        else{
            return back()->with('error','Invalid username or password');
        }
    }*/
}