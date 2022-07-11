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
    function viewcart($email){
        
        $carts = DB::Table('carts')->where('cus_email', $email)->get();
        $count = DB::Table('carts')->where('cus_email',$email)->count();
        $totalitems = DB::Table('carts')->where('cus_email', $email)->sum('qty');
        $totalprice = 0;

        $name = DB::Table('customers')->where('email', $email)->value('name');
        $primary_contact = DB::Table('customers')->where('email', $email)->value('primary_contact_number');
        $secondary_contact = DB::Table('customers')->where('email', $email)->value('secondary_contact_number');
        $delivery_address = DB::Table('customers')->where('email', $email)->value('delivery_address');

        

        return view('viewcart',[
            'count'=>$count,
            'carts'=>$carts,
            'email'=>$email,
            'name'=>$name,
            'totalprice'=>$totalprice,
            'totalitems'=>$totalitems,
            'delivery_address'=>$delivery_address,
            'primary_contact'=>$primary_contact,
            'secondary_contact'=>$secondary_contact,

        ]);
    }

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

        $cart_row = DB::Table('carts')->where([                 // find item exists in the cart
            ['cus_email','=',$reqcus_email],
            ['colour','=',$reqcolour],
            ['size','=',$reqsize],
            ['product_id','=',$reqproduct_id]
        ])->count();

        $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();
        $activeordercount = DB::Table('orders')->where([['email','=', $reqcus_email],['status','!=','Completed']])->count();


        if($cart_row > 0){                                      // if it's exist update qty

                $old_qty = DB::Table('carts')->where([
                    ['cus_email','=',$reqcus_email],
                    ['colour','=',$reqcolour],
                    ['size','=',$reqsize],
                    ['product_id','=',$reqproduct_id]
                ])->value('qty');

                $new_qty = $old_qty + $reqqty;

                $stock = DB::Table('products')->where('product_id', $reqproduct_id)->value('stock');

                if($stock < $new_qty){
                    $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();
                    $activeordercount = DB::Table('orders')->where([['email','=', $reqcus_email],['status','!=','Completed']])->count();
                    return view('home',[
                        'stock'=>$stock,
                        'name'=>$gotname,
                        'email'=>$reqcus_email,
                        'count'=>$count,
                        'stock'=>$stock,
                        'carts'=>$carts,
                        'activeordercount'=>$activeordercount
                    ]);

                }

                else{
                   
                    $cart_item = DB::table('carts')
                    ->where([['cus_email','=',$reqcus_email],['product_id','=',$reqproduct_id]])
                    ->update([
                        'qty' => $new_qty
                    ]);

                    $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();
                    $count = DB::Table('carts')->where('cus_email',$reqcus_email)->count();
                    $activeordercount = DB::Table('orders')->where([['email','=', $reqcus_email],['status','!=','Completed']])->count();
                    return view('home',[
                        'stock'=>$stock,
                        'name'=>$gotname,
                        'email'=>$reqcus_email,
                        'count'=>$count,
                        'carts'=>$carts,
                        'activeordercount'=>$activeordercount

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
                $activeordercount = DB::Table('orders')->where([['email','=', $reqcus_email],['status','!=','Completed']])->count();
                
                return view('home',[
                    'name'=>$gotname,
                    'email'=>$reqcus_email,
                    'count'=>$count,
                    'carts'=>$carts,
                    'activeordercount'=>$activeordercount
            ]);
        }


    }

    public function viewupdatecartitem($email, $product_id, $colour, $size){

        $gotname = DB::Table('customers')->where('email', $email)->value('name');
        $count = DB::Table('carts')->where('cus_email',$email)->count();
        

        $product_id = DB::Table('carts')->where([
            ['cus_email','=',$email],
            ['product_id','=',$product_id],
            ['colour','=',$colour],
            ['size','=',$size],
        ])->value('product_id');

        $stock = DB::Table('products')->where('product_id', $product_id)->value('stock');

        $product_name = DB::Table('carts')->where([
            ['cus_email','=',$email],
            ['product_id','=',$product_id],
            ['colour','=',$colour],
            ['size','=',$size],
        ])->value('product_name');

        $price = DB::Table('carts')->where([
            ['cus_email','=',$email],
            ['product_id','=',$product_id],
            ['colour','=',$colour],
            ['size','=',$size],
        ])->value('price');

        $colour = DB::Table('carts')->where([
            ['cus_email','=',$email],
            ['product_id','=',$product_id],
            ['colour','=',$colour],
            ['size','=',$size],
        ])->value('colour');

        $size = DB::Table('carts')->where([
            ['cus_email','=',$email],
            ['product_id','=',$product_id],
            ['colour','=',$colour],
            ['size','=',$size],
        ])->value('size');

        $qty = DB::Table('carts')->where([
            ['cus_email','=',$email],
            ['product_id','=',$product_id],
            ['colour','=',$colour],
            ['size','=',$size],
        ])->value('qty');

        return view('updatecartitem',[
            'stock'=>$stock,
            'name'=>$gotname,
            'email'=>$email,
            'count'=>$count,
            'product_id'=>$product_id,
            'product_name'=>$product_name,
            'colour'=>$colour,
            'size'=>$size,
            'price'=>$price,
            'qty'=>$qty

        ]);
    }

    public function updateqty(Request $request){
        $cart_item = DB::Table('carts')
            ->where([
                ['cus_email','=',$request->email],
                ['colour','=',$request->colour],
                ['size','=',$request->size],
                ['product_id','=',$request->product_id]
            ])->update([
                'qty' => $request->newqty
            ]);
            //return back();

        $name = DB::Table('customers')->where('email', $request->email)->value('name');
        $carts = DB::Table('carts')->where('cus_email', $request->email)->get();
        $count = DB::Table('carts')->where('cus_email',$request->email)->count();
        $totalprice = 0;
        $totalitems = DB::Table('carts')->where('cus_email', $request->email)->sum('qty');

        $primary_contact = DB::Table('customers')->where('email', $request->email)->value('primary_contact_number');
        $secondary_contact = DB::Table('customers')->where('email', $request->email)->value('secondary_contact_number');
        $delivery_address = DB::Table('customers')->where('email', $request->email)->value('delivery_address');

        return view('viewcart',[
            'count'=>$count,
            'carts'=>$carts,
            'email'=>$request->email,
            'name'=>$name,
            'totalprice'=>$totalprice,
            'totalitems'=>$totalitems,
            'delivery_address'=>$delivery_address,
            'primary_contact'=>$primary_contact,
            'secondary_contact'=>$secondary_contact,
        ]);
    }

    public function deleteitem($email, $product_id, $colour, $size){
        $cart_item = DB::Table('carts')
            ->where([
                ['cus_email','=',$email],
                ['product_id','=',$product_id],
                ['colour','=',$colour],
                ['size','=',$size],
            ])->delete();

        return back();

    }
}