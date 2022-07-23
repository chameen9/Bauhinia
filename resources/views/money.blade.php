<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Money</title>

        <!--Import bootstrap js-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!--X Icon-->
        <link rel = "icon" href = "{{URL::asset('/images/Xicon.ico')}}" type = "image/x-icon">

        <!--Jquery
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        -->

        <!--Import bootstrap css-->
        <link href="/css/bootstrap.css" rel="stylesheet">

        <!--Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


    </head>
    <body>

      <div class="shadow p-0 mb-1 bg-white rounded" id="top">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-light">
          <!-- Container wrapper -->
          <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="{{ url('/') }}">
              <img
                src="{{URL::asset('/images/TextLogo.png')}}"
                height="35"
                width="auto"
                alt="Bauhinia Logo"
                loading="lazy"
                style="margin-top: -1px;"
              />
            </a>
            <!--navbar toggler-->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navlist"><span class="navbar-toggler-icon"></span></button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navlist">
              <!-- right links -->
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                
                
              </ul>

              
              <!-- Left links -->

              <div class="d-flex align-items-center">
                <!-- Cart -->
               
                <!-- Cart -->

                &nbsp; &nbsp; &nbsp;

                <!-- Avatar -->
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="{{URL::asset('/profile/avatar.png')}}" height="35px" class="rounded-circle" loading="lazy">
                  </a>
                  <div class="dropdown-menu" style="width: 150px;">
                    <p class="text-muted" style="text-align: center;">Welcome,<br>
                    <label>{{$name}}</label></p>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/employee/editprofile') }}">Profile</a>
                   
                    <a class="dropdown-item" href="{{ url('/employee/signout') }}">Sign Out</a>
                  </div>
                </div>
                <!-- Avatar -->
              </div>
            </div>
            <!-- Collapsible wrapper -->
          </div>
          <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
      </div>
      <br>

      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-2">
                <div class="shadow bg-white rounded">
                    <div class="card p-1" style="border: 0;">
                    @if($auth_level == 1)
                        <a href="{{url('/employee/home/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-house"></i><br> Home</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/orders/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-shop"></i><br> Orders</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/inventory/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-card-checklist"></i><br> Inventory</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/stocks/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-boxes"></i></i><br> Stocks</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/money/'.$name.'/'.$email.'')}}" class="btn btn-primary"><i class="bi bi-coin"></i><br> Money</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/tools/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-gear"></i><br> Tools</a>
                    @else
                        <a href="{{url('/employee/home/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-house"></i><br> Home</a>
                        <br>
                        <br>
                        @if($department == 'Production')
                        <a href="{{url('/employee/orders/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-shop"></i><br> Orders</a>
                        @else
                        <a href="{{url('/employee/orders/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary disabled"><i class="bi bi-shop"></i><br> Orders</a>
                        @endif
                        <br>
                        <br>
                        @if($department == 'Inventory')
                        <a href="{{url('/employee/inventory/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-card-checklist"></i><br> Inventory</a>
                        @else
                        <a href="{{url('/employee/inventory/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary disabled"><i class="bi bi-card-checklist"></i><br> Inventory</a>
                        @endif
                        <br>
                        <br>
                        @if($department == 'Inventory')
                        <a href="{{url('/employee/stocks/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-boxes"></i></i><br> Stocks</a>
                        @else
                        <a href="{{url('/employee/stocks/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary disabled"><i class="bi bi-boxes"></i></i><br> Stocks</a>
                        @endif
                        <br>
                        <br>
                        @if($department == 'Accounting')
                        <a href="{{url('/employee/money/'.$name.'/'.$email.'')}}" class="btn btn-primary"><i class="bi bi-coin"></i><br> Money</a>
                        @else
                        <a href="{{url('/employee/money/'.$name.'/'.$email.'')}}" class="btn btn-primary disabled"><i class="bi bi-coin"></i><br> Money</a>
                        @endif
                        <br>
                        <br> 
                        <a href="" class="btn btn-outline-primary disabled"><i class="bi bi-gear"></i><br> Tools</a>
                    
                    @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-11 col-md-11 col-sm-10">
                <div class="row">
                    <div class="col-12">
                        <div class="shadow bg-white rounded">
                            <div class="card p-1" style="border: 0;">
                                <form action="{{url('/employee/find/money')}}" method="post">
                                    {{csrf_field()}}
                                    <br>
                                    <div class="row">
                                            <div class="col-1">
                                                <label><br></label>
                                            </div>
                                        
                                            <div class="col-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Month :</span>
                                                    </div>
                                                    
                                                    <select name="month" class="form-control">
                                                        <option value="This Month">This Month</option>
                                                        <option value="Last Month">Last Month</option>
                                                        <option value="All">All</option>
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="col-2">
                                                <input type="hidden" name="name" value="{{$name}}">
                                                <input type="hidden" name="email" value="{{$email}}">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-search"></i> Find</button>
                                            </div>
                                            <div class="col-3">
                                                <br>
                                            </div>
        
                                            @if($resultcount > 0)
                                            <div class="col-2">
                                                @if($auth_level == 1)
                                                <a href="{{url('/employee/'.$name.'/'.$email.'/'.$month.'/create/incomereport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
                                                @elseif($auth_level == 2)
                                                <a href="{{url('/employee/'.$name.'/'.$email.'/'.$month.'/create/incomereport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> Download Report</a>
                                                @elseif($auth_level == 3)
                                                <a href="{{url('/employee/'.$name.'/'.$email.'/'.$month.'/create/incomereport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
                                                @else
                                                <a href="{{url('/employee/'.$name.'/'.$email.'/'.$month.'/create/incomereport')}}" role="button" class="btn btn-info btn-block" disabled><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
                                                @endif
                                            </div>
                                            @else
                                            <div class="col-3">
                                                <br>
                                            </div>
                                            @endif
                                        
                                    </div>
                                    <br>
                                    <div class="row">
                                            @if($products != null)
                                            <p class="text-muted">
                                                @if($month == 'All')
                                                    Showing {{$resultcount}} of {{$month}} Results
                                                @else
                                                    Showing {{$resultcount}} Orders in {{$month}}
                                                @endif
                                            </p>
                                            @else
                                            <p align="center" class="text-muted">Find income report using this window.</p>
                                            @endif
                                
                                    </div>
                                            
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <br>
                    </div>
                    <div class="col-6">
                        <div class="shadow bg-white rounded">
                            <div class="card p-1" style="border: 0;">
                                <hr>
                                <div class="row">
                                    <div class="col-1">
                                        <br>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="text-muted">Total Orders</h4>
                                    </div>
                                    <div class="col-1">
                                        <h4 class="text-muted">:</h4>
                                    </div>
                                    <div class="col-5">
                                        <h4 class="text-muted" style="text-align: end;">{{$totorders}}</h4>
                                    </div>
                                    <div class="col-1">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <br>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="text-muted">Total Income</h4>
                                    </div>
                                    <div class="col-1">
                                        <h4 class="text-muted">:</h4>
                                    </div>
                                    <div class="col-5">
                                        @if($resultcount != null)
                                            @foreach($products as $product)
                                                <input type="hidden" name="totamount" value="{{$totamount = $totamount+$product->qty*$product->price}}">
                                            @endforeach
                                            <h4 class="text-muted" style="text-align: end;">Rs. {{$totamount}}</h4>
                                        @endif
                                    </div>
                                    <div class="col-1">
                                        <br>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <br>
                    </div>
                </div>
                <br>
                <div class="row"><!--start-->
                    <div class="col-4">
                        <div class="shadow bg-white rounded">
                            <div class="card p-1" style="border: 0;">
                                <h6 class="card-header">Pending Orders </h6>
                                <br>
                                <div class="scrollsec4">
                                    <table class="table">

                                        @if($resultcount != null)
                                        <div class="row">
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="col-4">
                                                Total Orders
                                            </div>
                                            <div class="col-2" style="text-align: start;">
                                                :
                                            </div>
                                            <div class="col-4" style="align-items: right; text-align: end;">
                                                {{$pendingorders}}
                                            </div>
                                            <div class="col-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="col-4">
                                                Total Amount
                                            </div>
                                            <div class="col-2" style="text-align: start;">
                                                :
                                            </div>
                                            <div class="col-4" style="align-items: right; text-align: end;">
                                                @foreach($products as $product)
                                                    @if($product->status == 'Pending')
                                                        <input type="hidden" name="tot" value="{{$pendingtot = $pendingtot+$product->qty*$product->price}}">
                                                    @endif
                                                @endforeach
                                                Rs. {{$pendingtot}}
                                            </div>
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                            <tr class="table-primary">
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>Status</th>
                                                <th align="right">Order value (Rs.)</th>
                                            </tr>
                                            @foreach($products as $product)
                                                @if($product->status == 'Pending')
                                                
                                                <tr>
                                                    <td>{{$product->order_id}}</td>
                                                    <td>{{$product->product_id}}</td>
                                                    <td>{{$product->status}}</td>
                                                    <td align="right">{{$product->qty*$product->price}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                       
                                    </table>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="shadow bg-white rounded">
                            <div class="card p-1" style="border: 0;">
                                <h6 class="card-header">Shipped Orders </h6>
                                <br>
                                <div class="scrollsec4">
                                    <table class="table">
    
                                        @if($resultcount != null)
                                        <div class="row">
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="col-4">
                                                Total Orders
                                            </div>
                                            <div class="col-2" style="text-align: start;">
                                                :
                                            </div>
                                            <div class="col-4" style="align-items: right; text-align: end;">
                                                {{$shippedorders}}
                                            </div>
                                            <div class="col-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="col-4">
                                                Total Amount
                                            </div>
                                            <div class="col-2" style="text-align: start;">
                                                :
                                            </div>
                                            <div class="col-4" style="align-items: right; text-align: end;">
                                                @foreach($products as $product)
                                                    @if($product->status == 'Shipped')
                                                        <input type="hidden" name="tot" value="{{$shippedtot = $shippedtot+$product->qty*$product->price}}">
                                                    @endif
                                                @endforeach
                                                Rs. {{$shippedtot}}
                                            </div>
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                            <tr class="table-primary">
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>Status</th>
                                                <th align="right">Order value (Rs.)</th>
                                            </tr>
                                            @foreach($products as $product)
                                                @if($product->status == 'Shipped')
                                                
                                                <tr>
                                                    <td>{{$product->order_id}}</td>
                                                    <td>{{$product->product_id}}</td>
                                                    <td>{{$product->status}}</td>
                                                    <td align="right">{{$product->qty*$product->price}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                       
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="shadow bg-white rounded">
                            <div class="card p-1" style="border: 0;">
                                <h6 class="card-header">Completed Orders </h6>
                                <br>
                                <div class="scrollsec4">

                                    <table class="table">

                                        @if($resultcount != null)
                                        <div class="row">
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="col-4">
                                                Total Orders
                                            </div>
                                            <div class="col-2" style="text-align: start;">
                                                :
                                            </div>
                                            <div class="col-4" style="align-items: right; text-align: end;">
                                                {{$completedorders}}
                                            </div>
                                            <div class="col-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="col-4">
                                                Total Amount
                                            </div>
                                            <div class="col-2" style="text-align: start;">
                                                :
                                            </div>
                                            <div class="col-4" style="align-items: right; text-align: end;">
                                                @foreach($products as $product)
                                                    @if($product->status == 'Completed')
                                                        <input type="hidden" name="tot" value="{{$completedtot = $completedtot+$product->qty*$product->price}}">
                                                    @endif
                                                @endforeach
                                                Rs. {{$completedtot}}
                                            </div>
                                            <div class="col-1">
                                                <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                            <tr class="table-primary">
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>Status</th>
                                                <th align="right">Order value (Rs.)</th>
                                            </tr>
                                            @foreach($products as $product)
                                                @if($product->status == 'Completed')
                                                
                                                <tr>
                                                    <td>{{$product->order_id}}</td>
                                                    <td>{{$product->product_id}}</td>
                                                    <td>{{$product->status}}</td>
                                                    <td align="right">{{$product->qty*$product->price}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end-->
                
            </div>

        </div>
      </div>
           
    </body>
</html>