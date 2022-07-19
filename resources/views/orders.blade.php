<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Orders</title>

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
                        <a href="{{url('/employee/home/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-house"></i><br> Home</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/orders/'.$name.'/'.$email.'')}}" class="btn btn-primary"><i class="bi bi-shop"></i><br> Orders</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/inventory/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-card-checklist"></i><br> Inventory</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/stocks/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-boxes"></i></i><br> Stocks</a>
                        <br>
                        <br>
                        <a href="#money" class="btn btn-outline-primary"><i class="bi bi-coin"></i><br> Money</a>
                        <br>
                        <br>
                        @if($auth_level == 1)
                            <a href="{{url('/employee/users/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-person-plus"></i><br> Users</a>
                        @elseif($auth_level == 2)
                            <a href="{{url('/employee/users/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-person-plus"></i><br> Users</a>
                        @else
                            <a href="" class="btn btn-outline-primary disabled"><i class="bi bi-person-plus"></i><br> Users</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-11 col-md-11 col-sm-10">
                <div class="shadow bg-white rounded">
                    <div class="card p-1" style="border: 0;">
                        <form action="{{url('/employee/find/orders')}}" method="post">
                            {{csrf_field()}}
                            
                            <br>
                            <div class="row">
                                    <div class="col-1">
                                        <label><br></label>
                                    </div>
                                
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Date :</span>
                                            </div>
                                            
                                            <select name="date" class="form-control">
                                                <option value="Today">Today</option>
                                                <option value="Yesterday">Yesterday</option>
                                                <option value="All">All</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Status :</span>
                                            </div>
                                            
                                            <select name="status" class="form-control">
                                                <option value="Pending">Pending</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Completed">Completed</option>
                                                <option value="All">All</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <input type="hidden" name="name" value="{{$name}}">
                                        <input type="hidden" name="email" value="{{$email}}">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-search"></i> Find</button>
                                    </div>

                                    @if($resultcount > 0)
                                    <div class="col-2">
                                        @if($auth_level == 1)
                                        <a href="{{url('/employee/'.$name.'/'.$email.'/'.$date.'/'.$stat.'/create/orderreport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> d Report</a>
                                        @elseif($auth_level == 2)
                                        <a href="{{url('/employee/'.$name.'/'.$email.'/'.$date.'/'.$stat.'/create/orderreport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
                                        @elseif($auth_level == 3)
                                        <a href="{{url('/employee/'.$name.'/'.$email.'/'.$date.'/'.$stat.'/create/orderreport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
                                        @else
                                        <a href="{{url('/employee/'.$name.'/'.$email.'/'.$date.'/'.$stat.'/create/orderreport')}}" role="button" class="btn btn-info btn-block" disabled><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
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
                                <section id="orders">
                                    @if($orders != null)
                                    <p class="text-muted">
                                        @if($stat == 'All' && $date == 'All')
                                            Showing {{$resultcount}} of {{$stat}} Results
                                        @else
                                            Showing {{$resultcount}} Results in {{$date}} {{$stat}} Orders
                                        @endif
                                    </p>
                                    <table class="table">
                                        <tr class="table-primary">
                                            <th>Order ID</th>
                                            <th>Product ID</th>
                                            <th>Customer Name</th>
                                            <th>Pr: Contact</th>
                                            <th>Se: Contact</th>
                                            <th>Delivery Address</th>
                                            <th>Quantity</th>
                                            <th>Order value</th>
                                            <th>Status</th>
                                            <th>Control</th>
                                        </tr>
                                        
        
                                        
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->order_id}}</td>
                                                <td>{{$order->product_id}}</td>
                                                <td>{{$order->cus_name}}</td>
                                                <td>{{$order->primary_contact}}</td>
                                                <td>{{$order->secondary_contact}}</td>
                                                <td>{{$order->delivery_address}}</td>
                                                <td>{{$order->qty}}</td>
                                                <td>Rs. {{$order->qty*$order->price}}</td>
                                                <td>{{$order->status}}</td>
                                                @if($order->status == 'Pending')
                                                    @if($auth_level == 1)
                                                        <td align="center">
                                                            <a href="{{url('/employee/order/markasshipped/'.$order->order_id.'/'.$name.'/'.$email.'')}}" class="btn btn-primary btn-sm">Mark as shipped</a>
                                                        </td>
                                                    @elseif($auth_level == 2)
                                                        <td align="center">
                                                            <a href="{{url('/employee/order/markasshipped/'.$order->order_id.'/'.$name.'/'.$email.'')}}" class="btn btn-primary btn-sm">Mark as shipped</a>
                                                        </td>
                                                    @elseif($auth_level == 3)
                                                        <td align="center">
                                                            <a href="{{url('/employee/order/markasshipped/'.$order->order_id.'/'.$name.'/'.$email.'')}}" class="btn btn-primary btn-sm">Mark as shipped</a>
                                                        </td>
                                                    @else
                                                        <td align="center">
                                                            <a href="{{url('/employee/order/markasshipped/'.$order->order_id.'/'.$name.'/'.$email.'')}}" class="btn btn-primary btn-sm disabled" data-mdb-toggle="tooltip" title="You can't do this action" >Mark as shipped</a>
                                                        </td>
                                                    @endif
                                                @elseif($order->status == 'Shipped')
                                                <td align="center">
                                                    <a class="btn-info btn-sm btn-block"><i class="bi bi-truck"></i></a>
                                                </td>
                                                @else
                                                <td align="center">
                                                    <a class="btn-success btn-sm btn-block"><i class="bi bi-check2"></i></a>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        
                                       
                                    </table>
                                    @else
                                        <p align="center" class="text-muted">Find orders using this window.</p>
                                    @endif
                                </section>
                            </div>
                        </form>
                            
                        
                        
                    </div>
                </div>
            </div>

        </div>
      </div>
              


    </body>
</html>