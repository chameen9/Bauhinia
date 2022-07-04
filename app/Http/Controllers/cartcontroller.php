<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Rules\PasswordChecker;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;

class cartcontroller extends Controller
{
    public function addtocart(Request $request){

        

        $product_id = $request->input('product_id');
        $cusemail = $request->email;
        $product_name = $request->input('name');
        $brand = $request->input('brand');
        $colour = $request->input('colour');
        $size = $request->input('size');
        $qty = $request->input('qty');

        $checkedemail = DB::Table('carts')->where('cus_email',);
        $gotname = DB::Table('customers')->where('email',$cusemail)->value('name');


        //$cartid = DB::Table('carts')->where('product_id', $product_id)->value('product_id');
        $cartcusemail = DB::Table('carts')->where('product_id', $product_id)->value('cus_email');

        $cartid = DB::Table('carts')->where('product_id', $product_id)->exists();

        if($cartid){

            return view('home',['name'=>$gotname , 'email'=>$cusemail]);

        }


        else{
            
            $Cart = new Cart();

            $Cart->product_id = $product_id;
            $Cart->cus_email = $cusemail;
            $Cart->product_name = $product_name;
            $Cart->brand = $brand;
            $Cart->colour = $colour;
            $Cart->size = $size;
            $Cart->qty = $qty;
            $Cart->save();
    
            return view('home',['name'=>$gotname , 'email'=>$cusemail]);

        }

    }
}
