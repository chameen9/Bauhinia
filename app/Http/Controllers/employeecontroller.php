<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Rules\PasswordChecker;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;

class employeecontroller extends Controller
{
    function checksignin(Request $request){
        
        $this->validate($request, [
            'email'=>['email','string','max:100'],
            //'password'=>['string', new PasswordChecker()], //pasword checker externel rule
        ]);

        $reqemail = $request->input('email');
        $reqpassword = $request->input('password');
        $gotemail = DB::Table('employees')->where('email',$reqemail)->value('email');
        $gotpassword = DB::Table('employees')->where('email',$reqemail)->value('password');
        $gotname = DB::Table('employees')->where('email',$reqemail)->value('name');
        $auth_level = DB::Table('employees')->where('email',$reqemail)->value('auth_level');

        if($gotemail==$reqemail){
            if($gotpassword==$reqpassword){
                return view('dashboard',[
                    'name'=>$gotname,
                    'orders'=>null,
                    'email'=>$gotemail,
                    'auth_level'=>$auth_level
                ]); //send name to the view     return customer view 
                
            }
            else{
                return back()->with('error','Invalid Password. Try again !');
            }
        }
        else{
            return back()->with('error','Unkonown user !');
        }
    }

    function confirm(Request $request){
        
        $this->validate($request, [
            'email'=>['email','string','max:100'],
        ]);

        $reqid = $request->input('id');
        $reqemail = $request->input('email');
        $gotid = DB::Table('employees')->where('id',$reqid)->value('id');
        $gotemail = DB::Table('employees')->where('id',$reqid)->value('email');
        $gotname = DB::Table('employees')->where('id',$reqid)->value('name');

        if($gotid==$reqid){
            if($gotemail==$reqemail){
                if($gotname==null){        //check wether name is empty or not
                    return view('e-signup',['id'=>$gotid,'email'=>$gotemail]); //send empid and email to the view
                }
                else{
                    return back()->with('error','You have already registerd !');
                }
            }
            else{
                return back()->with('error','Invalid email. Try again !');
            }
        }
        else{
            return back()->with('error','Unkonown user !');
        }
    }

    function signupasemployee(Request $request){

        $this->validate($request,[
            //'id'=>['string','max:50'],            Already assigned to input
            //'email'=>['string','max:100'],
            'name'=>['string','max:100','min:2'],
            'role'=>['string','max:100','min:2'],
            'password'=>['string', new PasswordChecker()],
            'address'=>['string','max:250','min:5'],
            'contact_number'=>['numeric','min:10'],
            'gender'=>['string'],
            'date_of_birth'=>['date'],
        ]);

        $id = $request->input('id');
        //$email = $request->input('email');        Already assigned to input
        $name = $request->input('name');
        $role = $request->input('role');
        $password = $request->input('password');
        $address = $request->input('address');
        $contact_number = $request->input('contact_number');
        $gender = $request->input('gender');
        $date_of_birth = $request->input('date_of_birth');
        $created_at= Carbon::now('Asia/Colombo');

        $Employee = DB::table('employees')
              ->where('id', $id)
              ->update([
                'name' => $name,
                'role' => $role,
                'password' => $password,
                'address' => $address,
                'contact_number' => $contact_number,
                'gender' => $gender,
                'date_of_birth' => $date_of_birth,
                'created_at' => $created_at
            ]);

        //return view('e-signupsuccessful');//->with('name',$name);
        return back()->with('message',$name);
    }

    public function vieworders($name, $email,){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');

        return view('orders',[
            'name'=>$name,
            'orders'=>null,
            'email'=>$email,
            'auth_level'=>$auth_level
        ]);
    }

    public function viewhome($name, $email,){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');

        return view('dashboard',[
            'name'=>$name,
            'orders'=>null,
            'email'=>$email,
            'auth_level'=>$auth_level
        ]);
    }

    function findorders(Request $request){ 

        $gotname = DB::Table('employees')->where('email',$request->email)->value('name');

        $reqdate = $request->date;
        $reqstatus = $request->status;

        $date = null;
        $status = null;

        if($reqstatus == 'All'){
            if($reqdate == 'All'){
                $orders = DB::Table('orders')->get();
            }
            else if($reqdate == 'Today'){
                $date = Carbon::today('Asia/Colombo')->toDateString();
                $orders = DB::Table('orders')->where('ordered_date',$date)->get();
            }
            else{
                $date = Carbon::yesterday('Asia/Colombo')->toDateString();
                $orders = DB::Table('orders')->where('ordered_date',$date)->get();
            }
        }
        else{

            if($reqdate == 'Today'){
                $date = Carbon::today('Asia/Colombo')->toDateString();
                $orders = DB::Table('orders')->where([['ordered_date','=',$date],['status','=',$reqstatus]])->get();
            }
            else{
                $date = Carbon::yesterday('Asia/Colombo')->toDateString();
                $orders = DB::Table('orders')->where([['ordered_date','=',$date],['status','=',$reqstatus]])->get();
            }
        }
        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');

        return view('orders',[
            'name'=>$gotname,
            'orders'=>$orders,
            'email'=>$request->email,
            'auth_level'=>$auth_level
        ]);
    }

    public function markasshipped($order_id, $name, $email){

        $shipped_order = DB::Table('orders')
            ->where([
                ['order_id','=',$order_id],
            ])->update([
                'status' => 'Shipped'
        ]);
        $orders = DB::Table('orders')->get();
        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');

        return view('orders',[
            'name'=>$name,
            'orders'=>$orders,
            'email'=>$email,
            'auth_level'=>$auth_level
        ]);

        //return redirect()->action('App\http\controllers\employeecontroller@findorders');
        //return redirect()->back();
    }

    public function signout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}