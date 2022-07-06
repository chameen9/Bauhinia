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
        $reqprice = $request->input('price');
        $reqbrand = $request->input('brand');
        $reqcolour = $request->input('colour');
        $reqsize = $request->input('size');
        $reqqty = $request->input('qty');

        $gotname = DB::Table('customers')->where('email',$reqcus_email)->value('name');

        $carts = DB::Table('carts')->where('email',$reqcus_email);

        $cart_row = DB::Table('carts')->where([             // find item exists in the cart
            ['cus_email','=',$reqcus_email],
            ['product_id','=',$reqproduct_id]
        ])->count();

        if($cart_row > 0){                                 // if it's exist update qty

                $old_qty = DB::Table('carts')->where([
                    ['cus_email','=',$reqcus_email],
                    ['product_id','=',$reqproduct_id]
                ])->value('qty');

                $new_qty = $old_qty + $reqqty;

                $stock = DB::Table('products')->where('product_id', $reqproduct_id)->value('stock');

                if($stock < $new_qty){
                    $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();

                    return view('home',[
                        'email'=>$reqcus_email,
                        'count'=>$count,
                        'stock'=>$stock,
                        'carts'=>$carts
                    ]);

                }

                else{
                   
                    $cart_item = DB::table('carts')
                    ->where([['cus_email','=',$reqcus_email],['product_id','=',$reqproduct_id]])
                    ->update([
                        'qty' => $new_qty
                    ]);

                    $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();

                    return view('home',[
                        'name'=>$gotname,
                        'email'=>$reqcus_email,
                        'count'=>$count,
                        'carts'=>$carts
                    ]);
                }

        }

        else{

                $Cart = new Cart;                                   // if it's not in the cart add as a new item

                $Cart->product_id = $reqproduct_id;
                $Cart->cus_email = $reqcus_email;
                $Cart->product_name = $reqproduct_name;
                $Cart->price = $reqprice;
                $Cart->brand = $reqbrand;
                $Cart->colour = $reqcolour;
                $Cart->size = $reqsize;
                $Cart->qty = $reqqty;
                $Cart->save();

                $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();

                return view('home',[
                    'name'=>$gotname,
                    'email'=>$reqcus_email,
                    'count'=>$count,
                    'carts'=>$carts
            ]);
        }


    }

    public function deletecartitem($email, $product_id){
        $cart_item = DB::Table('carts')
            ->where([
                ['cus_email','=',$email],
                ['product_id','=',$product_id]
            ])->get();

        $cart_item->delete();
        echo('deleted');

    }
}