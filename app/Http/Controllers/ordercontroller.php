<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use Carbon\Carbon;
use DB;

class ordercontroller extends Controller
{
    function vieworders($email){
        
        $orders = DB::Table('orders')->where('email', $email)->get();
        $count = DB::Table('orders')->where('email',$email)->count();
        $totalitems = DB::Table('orders')->where('email', $email)->sum('qty');
        $totalprice = 0;

        $name = DB::Table('orders')->where('email', $email)->value('cus_name');
        $primary_contact = DB::Table('orders')->where('email', $email)->value('primary_contact');
        $secondary_contact = DB::Table('orders')->where('email', $email)->value('secondary_contact');
        $delivery_address = DB::Table('orders')->where('email', $email)->value('delivery_address');

        return view('vieworders',[
            'count'=>$count,
            'orders'=>$orders,
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
            $order->status = 'Not Recieved';
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
            
        }

        $gotname = DB::Table('customers')->where('email',$request->email)->value('name');
        $count = DB::Table('carts')->where('cus_email', $request->email)->count();
        $ordercount = DB::Table('orders')->where('email', $request->email)->count();

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
            'name'=>$gotname,
            'email'=>$request->email,
            'count'=>$cartcount,
            'ordercount'=>$ordercount,
        ]); 

        

    }

}
