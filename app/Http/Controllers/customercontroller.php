<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Model\cart_product;
use App\Rules\PasswordChecker;
use Carbon\Carbon;
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

                return view('home',['name'=>$gotname]); //send name to the view
                    
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
            'gender'=>['string','max:20','min:3'],
            'confirm_password'=>['string', 'same:password'],
            'primary_contact_number'=>['numeric','min:10'],
            'secondary_contact_number'=>['numeric','min:10','different:primary_contact_number'],
        ]);
        
        $Customer->email=$request->email;
        $Customer->name=$request->name;
        $Customer->password=$request->password;
        $Customer->delivery_address=$request->delivery_address;
        $Customer->gender=$request->gender;
        $Customer->primary_contact_number=$request->primary_contact_number;
        $Customer->secondary_contact_number=$request->secondary_contact_number;
        $Customer->created_at= Carbon::now('Asia/Colombo');
        $Customer->save();
        return back()->with('message','Sign up successful.');
    }

    function editprofile(Request $request){ 
        $User = new User;

        $reqemail = $request->input('email');
        $reqpassword = $request->input('password');
        $gotemail = DB::Table('users')->where('email',$reqemail)->value('email');
        $gotpassword = DB::Table('users')->where('email',$reqemail)->value('password');
        $gotauth = DB::Table('users')->where('email',$reqemail)->value('auth_level');
        $gotname = DB::Table('users')->where('email',$reqemail)->value('name');
    }

    public function addtocart(Request $request){
        $product_id = $request->input('product_id');
        //$cusemail = $request->input('email');
        $product_name = $request->input('name');
        $brand = $request->input('brand');
        $colour = $request->input('colour');
        $size = $request->input('size');
        $qty = $request->input('qty');

        $cart_product = new cart_product;

        $cart_product->product_id = $product_id;
        $cart_product->cus_email = 'chameensandeepa9@gmail.com';
        $cart_product->product_name = $product_name;
        $cart_product->brand = $brand;
        $cart_product->colour = $colour;
        $cart_product->size = $size;
        $cart_product->qty = $qty;
        $cart_product->save();

    }
}