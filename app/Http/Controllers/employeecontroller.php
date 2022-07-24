<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Report;
use App\Rules\PasswordChecker;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class employeecontroller extends Controller
{
    // sign in sign up  //
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
        $department = DB::Table('employees')->where('email',$reqemail)->value('department');

        if($gotemail==$reqemail){
            if($gotpassword==$reqpassword){
                return view('dashboard',[
                    'name'=>$gotname,
                    'orders'=>null,
                    'email'=>$gotemail,
                    'auth_level'=>$auth_level,
                    'department'=>$department
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

    public function editprofile($email){
        $id = DB::Table('employees')->where('email',$email)->value('id');
        $employees = DB::Table('employees')->where('id',$id)->get();
        $gotname = DB::Table('employees')->where('id',$id)->value('name');

        return view('empeditprofile',[
            'employees'=>$employees,
            'name'=>$gotname,
            'email'=>$email,
        ]);
    }

    function saveprofile(Request $req){
        $this->validate($req, [
            'name'=>['required','string','max:100','min:2'],
            'date_of_birth'=>['required','date'],
            'gender'=>['required','string','max:10','min:3'],
            'current_password'=>['string', new PasswordChecker()], //pasword checker externel rule
            'new_password'=>[new PasswordChecker()], //pasword checker externel rule
            'confirm_password'=>['same:new_password'], //pasword checker externel rule
            'address'=>['string', 'max:250','min:5'],
            'contact_number'=>['string', 'max:15','min:9'], 
        ]);

        $employee = DB::table('employees')
              ->where('email', $req->email)
              ->update([
                'name' => $req->name,
                'password' => $req->confirm_password,
                'address' => $req->address,
                'gender' => $req->gender,
                'date_of_birth' => $req->date_of_birth,
                'contact_number' => $req->contact_number,
        ]);

        return back()->with('message','Your Information Updated !');
    }

    public function signout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
    // sign in sign up  //


    // orders  //
    public function vieworders($name, $email,){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$email)->value('department');

        return view('orders',[
            'name'=>$name,
            'orders'=>null,
            'email'=>$email,
            'auth_level'=>$auth_level,
            'date'=>null,
            'stat'=>null,
            'resultcount'=>null,
            'department'=>$department
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
        $department = DB::Table('employees')->where('email',$request->email)->value('department');

        return view('orders',[
            'name'=>$gotname,
            'orders'=>$orders,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'date'=>$reqdate,
            'stat'=>$reqstatus,
            'resultcount'=>$resultcount,
            'department'=>$department
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
        $department = DB::Table('employees')->where('email',$email)->value('department');
        

        return view('orders',[
            'name'=>$name,
            'orders'=>$orders,
            'email'=>$email,
            'auth_level'=>$auth_level,
            'date'=>'All',
            'stat'=>'All',
            'resultcount'=>$resultcount,
            'department'=>$department
        ]);
    }
    
    public function createorderreport($name, $email, $date, $stat){
        if($stat == 'All' && $date == 'All'){
            $orders = DB::Table('orders')->get();
            $resultcount = DB::Table('orders')->count();
        }
        else if($stat == 'All' && $date == 'Today'){
            $finddate = Carbon::today('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$finddate]])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$finddate]])->count();
        }
        else if($stat == 'All' && $date == 'Yesterday'){
            $finddate = Carbon::yesterday('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where('ordered_date',$finddate)->get();
            $resultcount = DB::Table('orders')->where('ordered_date',$finddate)->count();
        }
        else if($stat == 'Pending' && $date == 'Today'){
            $finddate = Carbon::today('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Pending']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Pending']])->count();
        }
        else if($stat == 'Pending' && $date == 'Yesterday'){
            $finddate = Carbon::yesterday('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Pending']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Pending']])->count();
        }
        else if($stat == 'Pending' && $date == 'All'){
            $orders = DB::Table('orders')->where([['status','=','Pending']])->get();
            $resultcount = DB::Table('orders')->where([['status','=','Pending']])->count();
        }
        else if($stat == 'Shipped' && $date == 'Today'){
            $finddate = Carbon::today('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Shipped']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Shipped']])->count();
        }
        else if($stat == 'Shipped' && $date == 'Yesterday'){
            $finddate = Carbon::yesterday('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Shipped']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Shipped']])->count();
        }
        else if($stat == 'Shipped' && $date == 'All'){
            $orders = DB::Table('orders')->where([['status','=','Shipped']])->get();
            $resultcount = DB::Table('orders')->where([['status','=','Shipped']])->count();
        }
        else if($stat == 'Completed' && $date == 'Today'){
            $finddate = Carbon::today('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Completed']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Completed']])->count();
        }
        else if($stat == 'Completed' && $date == 'Yesterday'){
            $finddate = Carbon::yesterday('Asia/Colombo')->toDateString();
            $orders = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Completed']])->get();
            $resultcount = DB::Table('orders')->where([['ordered_date','=',$finddate],['status','=','Completed']])->count();
        }
        else if($stat == 'Completed' && $date == 'All'){
            $orders = DB::Table('orders')->where([['status','=','Completed']])->get();
            $resultcount = DB::Table('orders')->where([['status','=','Completed']])->count();
        }


        $createddate = Carbon::today('Asia/Colombo')->toDateString();
        $createdtime = Carbon::now('Asia/Colombo')->toTimeString();
        $role = DB::Table('employees')->where('email',$email)->value('role');
        $first = 'Order Report of';
        $format = '.pdf';
        $reportstat = null;

        if($stat == 'All' && $date == 'All'){
            $reportstat = 'All';
        }
        else{
            $reportstat = $date.' '.$stat;
        }

        $pdfname =  $reportstat.' '.$first.' '.$createddate.' ['.$createdtime.']'.$format;

        $Report = new Report;
        $Report->created_by=$name;
        $Report->created_date=$createddate;
        $Report->created_time=$createdtime;
        $Report->report_type='Order Report';
        $Report->report_status=$date.'-'.$stat;
        $Report->save();

        $pdf = Pdf::loadView('PDF.orderreport',[
            'orders'=>$orders,
            'createddate'=>$createddate,
            'name'=>$name,
            'role'=>$role,
            'stat'=>$stat,
            'date'=>$date,
            'resultcount'=>$resultcount,
            'createdtime'=>$createdtime
        ]);
        return $pdf->download($pdfname);
    }
    // orders  //


    // inventory  //
    public function viewinventory($name, $email,){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$email)->value('department');

        return view('inventory',[
            'name'=>$name,
            'stocks'=>null,
            'email'=>$email,
            'auth_level'=>$auth_level,
            'stat'=>null,
            'resultcount'=>null,
            'department'=>$department
        ]);
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
        $department = DB::Table('employees')->where('email',$request->email)->value('department');

        return view('inventory',[
            'name'=>$gotname,
            'stocks'=>$stocks,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'stat'=>$reqcategory,
            'resultcount'=>$resultcount,
            'department'=>$department
        ]);
    }

    public function viewupdateinventoryitem($product_id, $name, $email){
        $stocks = DB::Table('products')->where('product_id',$product_id)->get();
        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$email)->value('department');

        return view('inventory-updateitem',[
            'auth_level'=>$auth_level,
            'name'=>$name,
            'stocks'=>$stocks,
            'email'=>$email,
            'product_id'=>$product_id,
            'resultcount'=>null,
            'department'=>$department
        ]);
    }

    public function updateinventoryitem(Request $request){

        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$request->email)->value('department');
        
        $updetails = DB::Table('products')
            ->where('product_id',$request->product_id)
            ->update([
                'product_name'=>$request->product_name,
                'brand'=>$request->brand,
                'price'=>$request->price
        ]);
        return view('inventory',[
            'name'=>$request->name,
            'stocks'=>null,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'stat'=>null,
            'resultcount'=>null,
            'department'=>$department
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
        $Product->category = $req->category;
        $Product->price = $req->price;
        $Product->stock = $req->stock;
        $Product->save();

        $auth_level = DB::Table('employees')->where('email',$req->email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$req->email)->value('department');

        /*return back()
            ->with('message','Product Added !')
            ->with('name', $req->name)
            ->with('stocks',null)
            ->with('email',$req->email)
            ->with('auth_level',$auth_level)
            ->with('stat',null)
            ->with('resultcount',null);

        return back()->with([
            'message'=>'Product Added !',
            'name'=>$req->name,
            'stocks'=>null,
            'email'=>$req->email,
            'auth_level'=>$auth_level,
            'stat'=>null,
            'resultcount'=>null
        ]);*/
        return view('inventory',[
            'message'=>'Product Added !',
            'name'=>$req->name,
            'stocks'=>null,
            'email'=>$req->email,
            'auth_level'=>$auth_level,
            'stat'=>null,
            'resultcount'=>null,
            'department'=>$department
        ]);
    }

    public function createinventoryreport($name, $email, $stat){
        if ($stat == 'All'){
            $stocks = DB::Table('products')->get();
            $resultcount = DB::Table('products')->count();
        }
        else{
            $stocks = DB::Table('products')->where('category',$stat)->get();
            $resultcount = DB::Table('products')->where('category',$stat)->count();
        }
        $date = Carbon::today('Asia/Colombo')->toDateString();
        $time = Carbon::now('Asia/Colombo')->toTimeString();
        $role = DB::Table('employees')->where('email',$email)->value('role');
        $first = 'Inventory Report of';
        $format = '.pdf';
        $pdfname = $stat.' '.$first.' '.$date.' ['.$time.']'.$format;

        $Report = new Report;
        $Report->created_by=$name;
        $Report->created_date=$date;
        $Report->created_time=$time;
        $Report->report_type='Inventory Report';
        $Report->report_status=$stat;
        $Report->save();

        $pdf = Pdf::loadView('PDF.inventoryreport',[
            'stocks'=>$stocks,
            'date'=>$date,
            'name'=>$name,
            'role'=>$role,
            'stat'=>$stat,
            'resultcount'=>$resultcount,
            'time'=>$time
        ]);
        return $pdf->download($pdfname);
    }
    // inventory  //


    //  stocks  //
    public function viewstocks($name, $email,){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$email)->value('department');

        return view('stocks',[
            'name'=>$name,
            'stocks'=>null,
            'email'=>$email,
            'auth_level'=>$auth_level,
            'resultcount'=>null,
            'department'=>$department
        ]);
    }

    function findstocks(Request $request){ 

        $gotname = DB::Table('employees')->where('email',$request->email)->value('name');

        $reqstatus = $request->status;
        $resultcount = null;

        
        if($reqstatus == 'Empty'){

            $stocks = DB::Table('products')->where([['stock','<=',0]])->get();
            $resultcount = DB::Table('products')->where([['stock','<=',0]])->count();
        }
        else if($reqstatus == 'Less than 20'){

            $stocks = DB::Table('products')->where([['stock','<=',20],['stock','>=',1]])->get();
            $resultcount = DB::Table('products')->where([['stock','<=',20],['stock','>=',1]])->count();
        }
        else if($reqstatus == 'Less than 50'){

            $stocks = DB::Table('products')->where([['stock','<=',50],['stock','>=',21]])->get();
            $resultcount = DB::Table('products')->where([['stock','<=',50],['stock','>=',21]])->count();
        }
        else{
            $stocks = DB::Table('products')->get();
            $resultcount = DB::Table('products')->count();
        }
        
        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$request->email)->value('department');

        return view('stocks',[
            'name'=>$gotname,
            'stocks'=>$stocks,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'stat'=>$reqstatus,
            'department'=>$department,
            'resultcount'=>$resultcount,
        ]);
    }

    public function viewupdatestock($product_id, $name, $email){
        $stocks = DB::Table('products')->where('product_id',$product_id)->get();
        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$email)->value('department');

        return view('inventory-updatestocks',[
            'auth_level'=>$auth_level,
            'name'=>$name,
            'stocks'=>$stocks,
            'email'=>$email,
            'product_id'=>$product_id,
            'department'=>$department,
            'resultcount'=>null
        ]);
    }

    public function updatestock(Request $request){
        $oldstock = DB::Table('products')->where('product_id', $request->product_id)->value('stock');
        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$request->email)->value('department');
        

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
            'resultcount'=>null,
            'department'=>$department,
            'resultcount'=>null
        ]);
    }

    public function createstockreport($name, $email, $stat){

        if($stat == 'Empty'){

            $stocks = DB::Table('products')->where([['stock','<=',0]])->get();
            $resultcount = DB::Table('products')->where([['stock','<=',0]])->count();
        }
        else if($stat == 'Less than 20'){

            $stocks = DB::Table('products')->where([['stock','<=',20],['stock','>=',1]])->get();
            $resultcount = DB::Table('products')->where([['stock','<=',20],['stock','>=',1]])->count();
        }
        else if($stat == 'Less than 50'){

            $stocks = DB::Table('products')->where([['stock','<=',50],['stock','>=',21]])->get();
            $resultcount = DB::Table('products')->where([['stock','<=',50],['stock','>=',21]])->count();
        }
        else{
            $stocks = DB::Table('products')->get();
            $resultcount = DB::Table('products')->count();
        }


        $date = Carbon::today('Asia/Colombo')->toDateString();
        $time = Carbon::now('Asia/Colombo')->toTimeString();
        $role = DB::Table('employees')->where('email',$email)->value('role');
        $first = 'Stock Report of';
        $format = '.pdf';
        $pdfname = $stat.' '.$first.' '.$date.' ['.$time.']'.$format;

        $Report = new Report;
        $Report->created_by=$name;
        $Report->created_date=$date;
        $Report->created_time=$time;
        $Report->report_type='Stock Report';
        $Report->report_status=$stat;
        $Report->save();

        $pdf = Pdf::loadView('PDF.stockreport',[
            'stocks'=>$stocks,
            'date'=>$date,
            'name'=>$name,
            'role'=>$role,
            'stat'=>$stat,
            'resultcount'=>$resultcount,
            'time'=>$time
        ]);
        return $pdf->download($pdfname);
    }
    //  stocks  //
    
    //  money   //
    public function viewmoney($name, $email){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$email)->value('department');


        return view('money',[
            'name'=>$name,
            'products'=>null,
            'email'=>$email,
            'auth_level'=>$auth_level,
            'month'=>null,
            'resultcount'=>null,
            'pendingtot'=>null,
            'shippedtot'=>null,
            'completedtot'=>null,
            'pendingorders'=>null,
            'shippedorders'=>null,
            'completedorders'=>null,
            'totorders'=>null,
            'department'=>$department,
            'totamount'=>null
        ]);
    }

    function findmoney(Request $request){ 

        $reqmonth = $request->month;
        $resultcount = null;
        $countmonth = null;
        $totorders = null;

        if($reqmonth == 'This Month'){
            $thisnmonth = Carbon::now()->month;
            $countmonth = $thisnmonth;
            $products = DB::Table('orders')->where('included_month',$thisnmonth)->get();
            $resultcount = DB::Table('orders')->where('included_month',$thisnmonth)->count();
            $totorders = $resultcount;
        }
        else if($reqmonth == 'Last Month'){
            $thisnmonth = Carbon::now()->month;
            $lastmonth = $thisnmonth-1;
            $countmonth = $lastmonth;
            $products = DB::Table('orders')->where('included_month',$lastmonth)->get();
            $resultcount = DB::Table('orders')->where('included_month',$lastmonth)->count();
            $totorders = $resultcount;
        }
        else{
            $products = DB::Table('orders')->get();
            $resultcount = DB::Table('orders')->count();
            $countmonth = 122;
            $totorders = $resultcount;
        }
        
        
        $gotname = DB::Table('employees')->where('email',$request->email)->value('name');
        $auth_level = DB::Table('employees')->where('email',$request->email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$request->email)->value('department');

        if($countmonth == 122){
            $pendingorders = DB::Table('orders')->where([
                ['status','=','Pending']
            ])->count();
            $shippedorders = DB::Table('orders')->where([
                ['status','=','Shipped']
            ])->count();
            $completedorders = DB::Table('orders')->where([
                ['status','=','Completed']
            ])->count();
            $totorders = DB::Table('orders')->count();
        }
        else{
            $pendingorders = DB::Table('orders')->where([
                ['status','=','Pending'],
                ['included_month','=',$countmonth]
            ])->count();
            $shippedorders = DB::Table('orders')->where([
                ['status','=','Shipped'],
                ['included_month','=',$countmonth]
            ])->count();
            $completedorders = DB::Table('orders')->where([
                ['status','=','Completed'],
                ['included_month','=',$countmonth]
            ])->count();
        }

        return view('money',[
            'name'=>$gotname,
            'products'=>$products,
            'email'=>$request->email,
            'auth_level'=>$auth_level,
            'month'=>$reqmonth,
            'resultcount'=>$resultcount,
            'pendingtot'=>null,
            'shippedtot'=>null,
            'completedtot'=>null,
            'pendingorders'=>$pendingorders,
            'shippedorders'=>$shippedorders,
            'completedorders'=>$completedorders,
            'totorders'=>$totorders,
            'department'=>$department,
            'totamount'=>null
        ]);
    }

    public function createincomereport($name, $email, $month){
        $resultcount = null;
        $countmonth = null;
        $totorders = null;

        if($month == 'This Month'){
            $thisnmonth = Carbon::now()->month;
            $countmonth = $thisnmonth;
            $products = DB::Table('orders')->where('included_month',$thisnmonth)->get();
            $resultcount = DB::Table('orders')->where('included_month',$thisnmonth)->count();
            $totorders = $resultcount;
        }
        else if($month == 'Last Month'){
            $thisnmonth = Carbon::now()->month;
            $lastmonth = $thisnmonth-1;
            $countmonth = $lastmonth;
            $products = DB::Table('orders')->where('included_month',$lastmonth)->get();
            $resultcount = DB::Table('orders')->where('included_month',$lastmonth)->count();
            $totorders = $resultcount;
        }
        else{
            $products = DB::Table('orders')->get();
            $resultcount = DB::Table('orders')->count();
            $countmonth = 122;
            $totorders = $resultcount;
        }
        
        
        $gotname = DB::Table('employees')->where('email',$email)->value('name');
        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        if($countmonth == 122){
            $pendingorders = DB::Table('orders')->where([
                ['status','=','Pending']
            ])->count();
            $shippedorders = DB::Table('orders')->where([
                ['status','=','Shipped']
            ])->count();
            $completedorders = DB::Table('orders')->where([
                ['status','=','Completed']
            ])->count();
            $totorders = DB::Table('orders')->count();
        }
        else{
            $pendingorders = DB::Table('orders')->where([
                ['status','=','Pending'],
                ['included_month','=',$countmonth]
            ])->count();
            $shippedorders = DB::Table('orders')->where([
                ['status','=','Shipped'],
                ['included_month','=',$countmonth]
            ])->count();
            $completedorders = DB::Table('orders')->where([
                ['status','=','Completed'],
                ['included_month','=',$countmonth]
            ])->count();
        }
        $date = Carbon::today('Asia/Colombo')->toDateString();
        $time = Carbon::now('Asia/Colombo')->toTimeString();
        $role = DB::Table('employees')->where('email',$email)->value('role');
        $first = 'Income Report of';
        $format = '.pdf';
        $pdfname = $month.' '.$first.' '.$date.' ['.$time.']'.$format;

        $Report = new Report;
        $Report->created_by=$name;
        $Report->created_date=$date;
        $Report->created_time=$time;
        $Report->report_type='Income Report';
        $Report->report_status='('.$countmonth.') '.$month;
        $Report->save();

        $pdf = Pdf::loadView('PDF.incomereport',[
            'products'=>$products,
            'date'=>$date,
            'name'=>$name,
            'role'=>$role,
            'resultcount'=>$resultcount,
            'time'=>$time,
            'month'=>$countmonth,
            'monthname'=>$month,
            'totorders'=>$totorders,
            'totamount'=>null,
            'pendingtot'=>null,
            'shippedtot'=>null,
            'completedtot'=>null,
        ]);
        return $pdf->download($pdfname);
    }
    //money //

    //  tools   //
    public function viewtools($name, $email){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$email)->value('department');
        $reports = DB::Table('reports')->orderBy('id', 'desc')->get();
        $employees = DB::Table('employees')->get();//->groupBy('department')

        return view('tools',[
            'name'=>$name,
            'products'=>null,
            'reports'=>$reports,
            'employees'=>$employees,
            'email'=>$email,
            'auth_level'=>$auth_level,
            'department'=>$department,
            'resultcount'=>null,
            
        ]);
    }

    public function addanemployee(Request $req){

        $this->validate($req,[
            'id'=>['string','max:10','min:8','unique:employees'],
            'department'=>['string'],
            'email'=>['email','string','max:100','unique:employees'],
            'auth_level'=>['numeric'],
        ]);

        $NewEmployee = new Employee;

        $NewEmployee->id = $req->id;
        $NewEmployee->email = $req->email;
        $NewEmployee->department = $req->department;
        $NewEmployee->auth_level = $req->auth_level;
        $NewEmployee->save();

        $department = DB::Table('employees')->where('email',$req->useremail)->value('department');
        $auth_level = DB::Table('employees')->where('email',$req->useremail)->value('auth_level');
        $reports = DB::Table('reports')->orderBy('id', 'desc')->get();
        $employees = DB::Table('employees')->get();//->groupBy('department')

        //dd($NewEmployee);

        return view('tools',[
            'name'=>$req->username,
            'products'=>null,
            'reports'=>$reports,
            'employees'=>$employees,
            'email'=>$req->useremail,
            'auth_level'=>$auth_level,
            'department'=>$department,
            'resultcount'=>null,
        ]);
    }
    //  tools   //

    //  home    //
    public function viewhome($name, $email,){

        $auth_level = DB::Table('employees')->where('email',$email)->value('auth_level');
        $department = DB::Table('employees')->where('email',$email)->value('department');

        return view('dashboard',[
            'name'=>$name,
            'email'=>$email,
            'department'=>$department,
            'auth_level'=>$auth_level
        ]);
    }
    //  home    //
    
}