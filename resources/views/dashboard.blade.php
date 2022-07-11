<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia</title>

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
                    <a class="dropdown-item" href="{{ url('/customer/editprofile') }}">Profile</a>
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/customer/signout') }}">Sign Out</a>
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
            <div class="col-lg-2 col-md-2 col-sm-3">
                <div class="shadow bg-white rounded">
                    <div class="card p-1" style="border: 0;">
                        <br>
                        <br>
                        <br>
                        <a href="#home" class="btn btn-outline-primary">Home</a>
                        <br>
                        <a href="#orders" class="btn btn-outline-primary">Orders</a>
                        <br>
                        <a href="#inventory" class="btn btn-outline-primary">Inventory</a>
                        <br>
                        <a href="#money" class="btn btn-outline-primary">Money</a>
                        <br>
                        <a href="#money" class="btn btn-outline-primary">Products</a>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-md-10 col-sm-9">
                <div class="shadow bg-white rounded">
                    <div class="card p-1" style="border: 0;">
                        <form action="{{url('/employee/find/orders')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                    <div class="col-1">
                                        <label><br></label>
                                    </div>
                                
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Date :</span>
                                            </div>
                                            
                                            <select name="date" class="form-control">
                                                <option value="All">All</option>
                                                <option value="Today">Today</option>
                                                <option value="Yesterday">Yesterday</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <label><br></label>
                                    </div>

                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Status :</span>
                                            </div>
                                            
                                            <select name="status" class="form-control">
                                                <option value="All">All</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <label><br></label>
                                    </div>

                                    <div class="col-3">
                                        <label><br></label>
                                        <input type="hidden" name="name" value="{{$name}}">
                                        <input type="hidden" name="email" value="{{$email}}">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-search"></i> Find</button>
                                    </div>
                                
                            </div>
                            <br>
                            <div class="row">
                                <section id="orders">
                                    @if($orders)
                                    <table class="table table-primary">
                                        <th>Order ID</th>
                                        <th>Product ID</th>
                                        <th>Customer Name</th>
                                        <th>Pr: Contact</th>
                                        <th>Se: Contact</th>
                                        <th>Del: Address</th>
                                        <th>Quantity</th>
                                        <th>Order value</th>
                                        <th>Status</th>
                                        <th>Control</th>
        
                                        
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
                                                <td>
                                                    <a href="aca" class="btn btn-success">Mark as shipped</a>
                                                </td>
                                                @else
                                                <td><a class="btn btn-warning">Completed</a></td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        
                                       
                                    </table>
                                    @endif
                                </section>
                            </div>
                        </form>
                            <br>
                            
                        
                        
                    </div>
                </div>
            </div>

        </div>
      </div>
              


    </body>
</html>