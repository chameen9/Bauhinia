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

        

        $reqproduct_id = $request->input('product_id');
        $reqcus_email = $request->input('cus_email');
        $reqproduct_name = $request->input('product_name');
        $reqbrand = $request->input('brand');
        $reqcolour = $request->input('colour');
        $reqsize = $request->input('size');
        $reqqty = $request->input('qty');

        $gotname = DB::Table('customers')->where('email',$reqcus_email)->value('name');

        $cart_row = DB::Table('carts')->where([             // find item exists in the cart
            ['cus_email','=',$reqcus_email],
            ['product_id','=',$reqproduct_id]
        ])->count();

            if($cart_row){                                      // if it's exist update qty
                //echo($cart_row);
                $old_qty = DB::Table('carts')->where([
                    ['cus_email','=',$reqcus_email],
                    ['product_id','=',$reqproduct_id]
                ])->value('qty');

                $new_qty = $old_qty + $reqqty;

                $stock = DB::Table('products')->where('product_id', $reqproduct_id)->value('stock');

                if($stock > $old_qty){
                    
                    $cart_item = DB::table('carts')
                    ->where([['cus_email','=',$reqcus_email],['product_id','=',$reqproduct_id]])
                    ->update([
                        'qty' => $new_qty
                    ]);

                    $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();

                    return view('home',['name'=>$gotname , 'email'=>$reqcus_email, 'count'=>$count]);

                }
                else{
                    echo('no stock');
                }

            }

            else{

                $Cart = new Cart;                                   // if it's not in the cart add as a new item

                $Cart->product_id = $reqproduct_id;
                $Cart->cus_email = $reqcus_email;
                $Crat->product_name = $reqproduct_name;
                $Crat->brand = $reqbrand;
                $Cart->colour = $reqcolour;
                $Crat->size = $reqsize;
                $Cart->qty = $reqqty;
                $Cart=save();

                $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();

                return view('home',['name'=>$gotname , 'email'=>$reqcus_email, 'count'=>$count]);
            }


    }
}
