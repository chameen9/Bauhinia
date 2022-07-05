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
    public function addtocart(Request $request){            //try again !!!!!!!!!!!!!!!!!!!!!!!!

        $reqproduct_id = $request->input('product_id');
        $reqcus_email = $request->input('cus_email');
        $reqproduct_name = $request->input('product_name');
        $reqbrand = $request->input('brand');
        $reqcolour = $request->input('colour');
        $reqsize = $request->input('size');
        $reqqty = $request->input('qty');

        $gotcus_email = DB::Table('carts')->where('cus_email',$reqcus_email)->value('cus_email');
        $gotproduct_id = DB::Table('carts')->where('cus_email',$reqcus_email)->value('product_id');
        $gotqty = DB::Table('carts')->where('cus_email',$reqcus_email)->value('qty');
        
        if($gotcus_email == $reqcus_email){
            if($gotproduct_id == $reqproduct_id){
                $gotcp_id = DB::Table('carts')->where('cus_email',$reqcus_email)->value('cp_id');

                dd($gotcp_id);

                
            }
            else{
                dd($gotproduct_id);
            }
        }
        else{
            dd('need to add the product as a new one');
        }

        /*//$cartid = DB::Table('carts')->where('product_id', $product_id)->value('product_id');
        $cartcusemail = DB::Table('carts')->where('product_id', $product_id)->value('cus_email');

        $cartid = DB::Table('carts')->where('cus_email', $cusemail)->value('product_id')->exists(); ///fix thissss

        $count = DB::Table('carts')->where('cus_email', $cusemail)->count();

        if($cartid){

            //return view('home',['name'=>$gotname , 'email'=>$cusemail]);
            dd($cartid);

        }


        else{

            if($count>0){
                $Cart = new Cart();

                $Cart->product_id = $product_id;
                $Cart->cus_email = $cusemail;
                $Cart->product_name = $product_name;
                $Cart->brand = $brand;
                $Cart->colour = $colour;
                $Cart->size = $size;
                $Cart->qty = $qty;
                $Cart->save();
        
                return view('home',['name'=>$gotname , 'email'=>$cusemail, 'count'=>$count]);
    
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
            
            
        }*/

    }
}
