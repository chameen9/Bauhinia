<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use Carbon\Carbon;
use DB;
use Redirect;

class ordercontroller extends Controller
{
    function vieworders($email){
        
        $orders = DB::Table('orders')->where([['email','=', $email],['status','!=','Completed']])->get();
        $oldorders = DB::Table('orders')->where([['email','=', $email],['status','=','Completed']])->get();
        $activeordercount = DB::Table('orders')->where([['email','=', $email],['status','!=','Completed']])->count();
        $oldordercount = DB::Table('orders')->where([['email','=', $email],['status','=','Completed']])->count();
        $totalitems = DB::Table('orders')->where([['email','=', $email],['status','!=','Completed']])->sum('qty');
        $totalprice = 0;

        $name = DB::Table('orders')->where('email', $email)->value('cus_name');
        $primary_contact = DB::Table('orders')->where('email', $email)->value('primary_contact');
        $secondary_contact = DB::Table('orders')->where('email', $email)->value('secondary_contact');
        $delivery_address = DB::Table('orders')->where('email', $email)->value('delivery_address');

        return view('vieworders',[
            'activeordercount'=>$activeordercount,
            'oldordercount'=>$oldordercount,
            'orders'=>$orders,
            'oldorders'=>$oldorders,
            'email'=>$email,
            'name'=>$name,
            'totalprice'=>$totalprice,
            'totalitems'=>$totalitems,
            'delivery_address'=>$delivery_address,
            'primary_contact'=>$primary_contact,
            'secondary_contact'=>$secondary_contact,
        ]);
    }

    public function checkoutconfirm(Request $request){

        $upcustomer = DB::table('customers')
              ->where('email', $request->email)
              ->update([
                'name' => $request->up_name,
                'delivery_address' => $request->up_delivery_address,
                'primary_contact_number' => $request->up_primary_contact,
                'secondary_contact_number' => $request->up_secondary_contact
        ]);


        foreach($request->key as $key => $key){
            $order = new order;

            $order->product_id = $request->product_id[$key];
            $order->product_name = $request->product_name[$key];
            $order->colour = $request->colour[$key];
            $order->size = $request->size[$key];
            $order->qty = $request->qty[$key];
            $order->price = $request->price[$key];
            $order->email = $request->email;
            $order->status = 'Pending';
            $order->cus_name = $request->up_name;
            $order->primary_contact = $request->up_primary_contact;
            $order->secondary_contact = $request->up_secondary_contact;
            $order->delivery_address = $request->up_delivery_address;
            $order->ordered_date = Carbon::today('Asia/Colombo')->toDateString();
            $order->ordered_time = Carbon::now('Asia/Colombo')->toTimeString();
            $order->est_del_date = Carbon::today('Asia/Colombo')->addDays(3)->toDateString();
            $order->save();

            $cart_item = DB::Table('carts')
            ->where([
                ['cus_email','=',$request->email],
                ['product_id','=',$request->product_id[$key]],
                ['colour','=',$request->colour[$key]],
                ['size','=',$request->size[$key]],
                ['qty','=',$request->qty[$key]],
                
            ])->delete();

            $stockqty = DB::Table('products')->where('product_id', $request->product_id[$key])->value('stock');
            $newstock = $stockqty - $request->qty[$key];

            $upstock = DB::table('products')
              ->where('product_id', $request->product_id[$key])
              ->update([
                'stock' => $newstock
            ]);
            
        }

        $gotname = DB::Table('customers')->where('email',$request->email)->value('name');
        $count = DB::Table('carts')->where('cus_email', $request->email)->count();
        $ordercount = DB::Table('orders')->where('email', $request->email)->count();

        $activeordercount = DB::Table('orders')->where([['email','=', $request->email],['status','!=','Completed']])->count();

        if($count > 0){
            $cartcount = $count;
        }
        else{
            $cartcount = null;
        }

        if($ordercount > 0){
            $ordercount = $ordercount;
        }
        else{
            $ordercount = null;
        }

        return view('home',[
            'activeordercount'=>$activeordercount,
            'name'=>$gotname,
            'email'=>$request->email,
            'count'=>$cartcount,
            'ordercount'=>$ordercount,
        ]); 

        

    }

    public function markasrecieved($email, $product_id, $colour, $size, $qty, $ordered_date, $ordered_time){
        $recived_order = DB::Table('orders')
            ->where([
                ['email','=',$email],
                ['product_id','=',$product_id],
                ['colour','=',$colour],
                ['size','=',$size],
                ['qty','=',$qty],
                ['ordered_date','=',$ordered_date],
                ['ordered_time','=',$ordered_time],

            ])->update([
                'status' => 'Completed'
            ]);

            return back();

    }

    public function removeorder($email, $product_id, $colour, $size, $qty, $ordered_date, $ordered_time){
        $recived_order = DB::Table('orders')
            ->where([
                ['email','=',$email],
                ['product_id','=',$product_id],
                ['colour','=',$colour],
                ['size','=',$size],
                ['qty','=',$qty],
                ['ordered_date','=',$ordered_date],
                ['ordered_time','=',$ordered_time],

            ])->update([
                'status' => 'Deleted'
            ]);

            return back();

    }

}
