<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Product;
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
            'email'=>$email,
            'auth_level'=>$auth_level
        ]);
    }

    public function viewinventory($name, $email,){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');

        return view('inventory',[
            'name'=>$name,
            'stocks'=>null,
            'email'=>$email,
            'auth_level'=>$auth_level
        ]);
    }

    public function viewstocks($name, $email,){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');

        return view('stocks',[
            'name'=>$name,
            'stocks'=>null,
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
        $resultcount = null;

        if($reqstatus == 'All' && $reqdate == 'All'){
            $orders = DB::Table('orders')->get();
            $resultcount = DB::Table('orders')->count();
        }
        else if($reqstatus == 'All' && $reqdate == 'Today'){
            $date = Carbon::today('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$date]])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$date]])->count();
        }
        else if($reqstatus == 'All' && $reqdate == 'Yesterday'){
            $date = Carbon::yesterday('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where('ordered_date',$date)->get();
            $resultcount = DB::Table('orders')->where('ordered_date',$date)->count();
        }
        else if($reqstatus == 'Pending' && $reqdate == 'Today'){
            $date = Carbon::today('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Pending']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Pending']])->count();
        }
        else if($reqstatus == 'Pending' && $reqdate == 'Yesterday'){
            $date = Carbon::yesterday('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Pending']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Pending']])->count();
        }
        else if($reqstatus == 'Pending' && $reqdate == 'All'){
            $orders = DB::Table('orders')->where([['status','=','Pending']])->get();
            $resultcount = DB::Table('orders')->where([['status','=','Pending']])->count();
        }
        else if($reqstatus == 'Shipped' && $reqdate == 'Today'){
            $date = Carbon::today('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Shipped']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Shipped']])->count();
        }
        else if($reqstatus == 'Shipped' && $reqdate == 'Yesterday'){
            $date = Carbon::yesterday('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Shipped']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Shipped']])->count();
        }
        else if($reqstatus == 'Shipped' && $reqdate == 'All'){
            $orders = DB::Table('orders')->where([['status','=','Shipped']])->get();
            $resultcount = DB::Table('orders')->where([['status','=','Shipped']])->count();
        }
        else if($reqstatus == 'Completed' && $reqdate == 'Today'){
            $date = Carbon::today('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Completed']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Completed']])->count();
        }
        else if($reqstatus == 'Completed' && $reqdate == 'Yesterday'){
            $date = Carbon::yesterday('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Completed']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$date],['status','=','Completed']])->count();
        }
        else if($reqstatus == 'Completed' && $reqdate == 'All'){
            $orders = DB::Table('orders')->where([['status','=','Completed']])->get();
            $resultcount = DB::Table('orders')->where([['status','=','Completed']])->count();
        }

        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');

        return view('orders',[
            'name'=>$gotname,
            'orders'=>$orders,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'date'=>$reqdate,
            'stat'=>$reqstatus,
            'resultcount'=>$resultcount
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
        $resultcount = DB::Table('orders')->count();
        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');

        return view('orders',[
            'name'=>$name,
            'orders'=>$orders,
            'email'=>$email,
            'auth_level'=>$auth_level,
            'date'=>'All',
            'stat'=>'All',
            'resultcount'=>$resultcount
        ]);

        //return redirect()->action('App\http\controllers\employeecontroller@findorders');
        //return redirect()->back();
    }
    
    function findinventory(Request $request){ 

        $gotname = DB::Table('employees')->where('email',$request->email)->value('name');

        $reqstatus = $request->status;
        $reqcategory = $request->category;

        $resultcount = null;

        if($reqcategory == 'T-Shirt Store'){

            $stocks = DB::Table('products')->where([['category','=','T-Shirt Store']])->get();
            $resultcount = DB::Table('products')->where([['category','=','T-Shirt Store']])->count();
        }
        else if($reqcategory == 'New Arrivals'){

            $stocks = DB::Table('products')->where([['category','=','New Arrivals']])->get();
            $resultcount = DB::Table('products')->where([['category','=','New Arrivals']])->count();
        }
        else if($reqcategory == 'High End Fashion Store'){

            $stocks = DB::Table('products')->where([['category','=','High End Fashion Store']])->get();
            $resultcount = DB::Table('products')->where([['category','=','High End Fashion Store']])->count();
        }
        else{
            $stocks = DB::Table('products')->get();
            $resultcount = DB::Table('products')->count();
        }

        
        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');

        return view('inventory',[
            'name'=>$gotname,
            'stocks'=>$stocks,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'stat'=>$reqcategory,
            'resultcount'=>$resultcount
        ]);
    }

    function findstocks(Request $request){ 

        $gotname = DB::Table('employees')->where('email',$request->email)->value('name');

        $reqstatus = $request->status;

        
        if($reqstatus == 'Empty'){

            $stocks = DB::Table('products')->where([['stock','<=',0]])->get();
        }
        else if($reqstatus == 'Less than 20'){

            $stocks = DB::Table('products')->where([['stock','<=',20],['stock','>=',1]])->get();
        }
        else if($reqstatus == 'Less than 50'){

            $stocks = DB::Table('products')->where([['stock','<=',50],['stock','>=',21]])->get();
        }
        else{
            $stocks = DB::Table('products')->get();
        }
        
        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');

        return view('stocks',[
            'name'=>$gotname,
            'stocks'=>$stocks,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'stat'=>$reqstatus
        ]);
    }

    public function viewupdatestock($product_id, $name, $email){
        $stocks = DB::Table('products')->where('product_id',$product_id)->get();
        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');

        return view('inventory-updatestocks',[
            'auth_level'=>$auth_level,
            'name'=>$name,
            'stocks'=>$stocks,
            'email'=>$email,
            'product_id'=>$product_id
        ]);
    }

    public function viewupdateinventoryitem($product_id, $name, $email){
        $stocks = DB::Table('products')->where('product_id',$product_id)->get();
        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');

        return view('inventory-updateitem',[
            'auth_level'=>$auth_level,
            'name'=>$name,
            'stocks'=>$stocks,
            'email'=>$email,
            'product_id'=>$product_id
        ]);
    }
    
    public function updateinventoryitem(Request $request){
        $oldstock = DB::Table('products')->where('product_id', $request->product_id)->value('stock');
        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');

        $reqstock = $request->new_stock;

        $newstock = $oldstock + $reqstock;

        $upstock = DB::Table('products')
            ->where('product_id',$request->product_id)
            ->update([
                'stock' => $newstock
        ]);
        return view('inventory',[
            'name'=>$request->name,
            'stocks'=>null,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'stat'=>null,
            'resultcount'=>null
        ]);
    }

    public function updatestock(Request $request){
        $oldstock = DB::Table('products')->where('product_id', $request->product_id)->value('stock');
        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');

        $reqstock = $request->new_stock;

        $newstock = $oldstock + $reqstock;

        $upstock = DB::Table('products')
            ->where('product_id',$request->product_id)
            ->update([
                'stock' => $newstock
        ]);
        return view('stocks',[
            'name'=>$request->name,
            'stocks'=>null,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'stat'=>null,
            'resultcount'=>null
        ]);
    }

    public function addnewproduct(Request $req){
        $this->validate($req,[
            'product_id'=>['string','max:100','min:8','unique:products'],
            'product_name'=>['string','max:300','min:10'],
            'brand'=>['string','max:100',],
            'price'=>['max:100','min:4',],
            'stock'=>['numeric'],
        ]);
        $Product = new Product;
        $Product->product_id = $req->product_id;
        $Product->product_name = $req->product_name;
        $Product->brand = $req->brand;
        $Product->price = $req->price;
        $Product->stock = $req->stock;
        $Product->save();

        return back()->with('message','Product Added !');
    }

    public function signout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}