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
        <div class="shadow p-0 mb-1 bg-white rounded">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-light">
              <!-- Container wrapper -->
              <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="{{ url('/customer/home/'.$email.'') }}">
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
                    
                    
                    <!-- About Us -->
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/aboutus') }}">About Us</a>
                    </li>
                    <!-- Contact -->
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                  </ul>
    
                  
                  <!-- Left links -->
    
                  <div class="d-flex align-items-center">
    
                    &nbsp; &nbsp; &nbsp;
    
                    <!-- Avatar -->
                    <div class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="{{URL::asset('/profile/avatar.png')}}" height="35px" class="rounded-circle" loading="lazy">
                      </a>
                      <div class="dropdown-menu" style="width: 150px;">
                        <p class="text-muted" style="text-align: center;">Welcome,<br>
                        <label>{{$name}}</label></p>
                        <hr>
                        <a class="dropdown-item" href="{{ url('/customer/editprofile') }}">Profile</a>
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

            <section class="h-100 gradient-custom">
              <form action="{{url('/customer/order/checkout/confirm')}}" method="post">
                {{csrf_field()}}
                <div class="container py-5">
                  <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                      <div class="shadow p-0 mb-1 bg-white rounded">
                        <div class="card mb-4">
                          <div class="card-header py-3">
                            <h5 class="mb-0">Active Orders - {{$activeordercount}} items</h5>
                          </div>
                          <div class="card-body">
                          

                            @foreach($orders as $order)
                            <!-- Single item -->
                            <div class="row">
                              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                  <img src="{{URL::asset('/products/'.$order->product_id.'.png')}}"
                                    class="w-100 height: 100px; img-fluid"/>
                                </div>
                                <!-- Image -->
                              </div>
                
                              <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <input type="hidden" name="key[]" value="{{$order->order_id}}">
                                <input type="hidden" name="product_id[]" value="{{$order->product_id}}">
                                <input type="hidden" name="email" value="{{$email}}">
                                <input type="hidden" name="primary_contact" value="{{$primary_contact}}">
                                <input type="hidden" name="secondary_contact" value="{{$secondary_contact}}">
                                <input type="hidden" name="delivery_address" value="{{$delivery_address}}">
                                <p class="lead"><b><i>{{$order->product_name}}</i></b></p>
                                <input type="hidden" name="product_name[]" value="{{$order->product_name}}">
                                <p>Color: {{$order->colour}} <img src="{{URL::asset('/colours/'.$order->colour.'.png')}}" width="15px" height="15px" class="rounded-circle"></p>
                                <input type="hidden" name="colour[]" value="{{$order->colour}}">
                                <p>Size: {{$order->size}}</p>
                                <input type="hidden" name="size[]" value="{{$order->size}}">
                                
                                <div class="row">
                                    <div class="col-6">
                                       <p><i>Ordered Date:</i></p>
                                    </div>
                                    <div class="col-6"><i>Estimated Delivery Date:</i></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><strong>{{$order->ordered_date}}</strong></div>
                                    <div class="col-6"><strong>{{$order->est_del_date}}</strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><br></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Order Status: 
                                    </div>
                                    <div class="col-8">
                                        @if($order->status == 'Pending')
                                        <p class="text-muted"><i class="bi bi-hourglass-split"></i> {{$order->status}}</p>
                                        @elseif($order->status == 'Shipped')
                                        <p class="text-primary"><i class="bi bi-truck"></i> {{$order->status}}</p>
                                        @else
                                        <p class="text-success"><i class="bi bi-check2-circle"></i> {{$order->status}}</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Data -->
                              </div>
                
                              <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                <div class="row">
                                    <!-- Quantity -->
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                                                
                                      <div class="form-outline">
                                        <label class="form-label">Quantity :</label>
                                        <input type="hidden" name="qty[]" value="{{$order->qty}}">
                                        <label class="form-label">{{$order->qty}}</label>
                                      </div>
                                      
  
                                    </div>
                                    <!-- Quantity -->
                                </div>
                                <div class="row">
                                  <div class="col-12">
                                      <!-- Price -->
                                      <p class="text-start text-muted">
                                        Item Price : Rs. {{$order->price}}
                                      </p>
                                      <!-- Price -->
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        @if($order->status == 'Shipped')
                                            <a href="{{url('/customer/order/markasrecieved/'.$email.'/'.$order->product_id.'/'.$order->colour.'/'.$order->size.'/'.$order->qty.'/'.$order->ordered_date.'/'.$order->ordered_time.' ')}}" 
                                                role="button" class="btn btn-primary btn-sm mb-2" data-mdb-toggle="tooltip" title="Mark as Recieved When You Recieved The Item">
                                                <i class="bi bi-check"></i> Mark as Recieved
                                            </a>
                                        @elseif($order->status == 'Completed')
                                            <a href="{{url('/customer/order/delete/'.$email.'/'.$order->product_id.'/'.$order->colour.'/'.$order->size.'/'.$order->qty.'/'.$order->ordered_date.'/'.$order->ordered_time.' ')}}" 
                                                role="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip" title="Remove this Order">
                                                <i class="bi bi-trash"></i> Remove
                                            </a>
                                        @else
                                        @endif
                                    </div>
                                </div>
                                
                                <input type="hidden" value="{{$totalprice = $totalprice + $order->price*$order->qty}}"></input>
                                
                                
                              </div>
                            </div>
  
                            <hr class="my-4" />
                            <!-- Single item -->
                            @endforeach

                          
                          </div>
  
                        </div>
                      </div>

                      <!--Old Orders-->
                      <div class="shadow p-0 mb-1 bg-white rounded">
                        <div class="card mb-4">
                          <div class="card-header py-3">
                            <h5 class="mb-0">Completed Orders - {{$oldordercount}} items</h5>
                          </div>
                          <div class="card-body">
                          

                            @foreach($oldorders as $oldorder)
                            <!-- Single item -->
                            <div class="row">
                              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                  <img src="{{URL::asset('/products/'.$oldorder->product_id.'.png')}}"
                                    class="w-100 height: 100px; img-fluid"/>
                                </div>
                                <!-- Image -->
                              </div>
                
                              <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <input type="hidden" name="key[]" value="{{$oldorder->order_id}}">
                                <input type="hidden" name="product_id[]" value="{{$oldorder->product_id}}">
                                <input type="hidden" name="email" value="{{$email}}">
                                <input type="hidden" name="primary_contact" value="{{$primary_contact}}">
                                <input type="hidden" name="secondary_contact" value="{{$secondary_contact}}">
                                <input type="hidden" name="delivery_address" value="{{$delivery_address}}">
                                <p class="lead"><b><i>{{$oldorder->product_name}}</i></b></p>
                                <input type="hidden" name="product_name[]" value="{{$oldorder->product_name}}">
                                <p>Color: {{$oldorder->colour}} <img src="{{URL::asset('/colours/'.$oldorder->colour.'.png')}}" width="15px" height="15px" class="rounded-circle"></p>
                                <input type="hidden" name="colour[]" value="{{$oldorder->colour}}">
                                <p>Size: {{$oldorder->size}}</p>
                                <input type="hidden" name="size[]" value="{{$oldorder->size}}">
                                
                                <div class="row">
                                    <div class="col-6">
                                       <p><i>Ordered Date:</i></p>
                                    </div>
                                    <div class="col-6"><i>Estimated Delivery Date:</i></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><strong>{{$oldorder->ordered_date}}</strong></div>
                                    <div class="col-6"><strong>{{$oldorder->est_del_date}}</strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><br></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Order Status: 
                                    </div>
                                    <div class="col-8">
                                        @if($oldorder->status == 'Pending')
                                        <p class="text-muted"><i class="bi bi-hourglass-split"></i> {{$oldorder->status}}</p>
                                        @elseif($oldorder->status == 'Shipped')
                                        <p class="text-primary"><i class="bi bi-truck"></i> {{$oldorder->status}}</p>
                                        @else
                                        <p class="text-success"><i class="bi bi-check2-circle"></i> {{$oldorder->status}}</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Data -->
                              </div>
                
                              <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                <div class="row">
                                    <!-- Quantity -->
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                                                
                                      <div class="form-outline">
                                        <label class="form-label">Quantity :</label>
                                        <input type="hidden" name="qty[]" value="{{$oldorder->qty}}">
                                        <label class="form-label">{{$oldorder->qty}}</label>
                                      </div>
                                      
  
                                    </div>
                                    <!-- Quantity -->
                                </div>
                                <div class="row">
                                  <div class="col-12">
                                      <!-- Price -->
                                      <p class="text-start text-muted">
                                        Item Price : Rs. {{$oldorder->price}}
                                      </p>
                                      <!-- Price -->
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        @if($oldorder->status == 'Shipped')
                                            <a href="{{url('/customer/order/markasrecieved/'.$email.'/'.$oldorder->product_id.'/'.$oldorder->colour.'/'.$oldorder->size.'/'.$oldorder->qty.'/'.$oldorder->ordered_date.'/'.$oldorder->ordered_time.' ')}}" 
                                                role="button" class="btn btn-primary btn-sm mb-2" data-mdb-toggle="tooltip" title="Mark as Recieved When You Recieved The Item">
                                                <i class="bi bi-check"></i> Mark as Recieved
                                            </a>
                                        @elseif($oldorder->status == 'Completed')
                                            <a href="{{url('/customer/order/removeorder/'.$email.'/'.$oldorder->product_id.'/'.$oldorder->colour.'/'.$oldorder->size.'/'.$oldorder->qty.'/'.$oldorder->ordered_date.'/'.$oldorder->ordered_time.' ')}}" 
                                                role="button" class="btn btn-outline-danger btn-sm mb-2" data-mdb-toggle="tooltip" title="Remove this Order">
                                                <i class="bi bi-trash"></i> Remove from Orders
                                            </a>
                                        @else
                                        @endif
                                    </div>
                                </div>
                                
                                
                                
                                
                              </div>
                            </div>
  
                            <hr class="my-4" />
                            <!-- Single item -->
                            @endforeach

                          
                          </div>
  
                        </div>
                      </div>
                      <!--Old Orders-->

                      
                      
                      
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-12">
                          <div class="shadow p-0 mb-1 bg-white rounded">
                            <div class="card mb-4">
                              <div class="card-header py-3">
                                <h5 class="mb-0">Actice Orders - Summary</h5>
                              </div>
                              <div class="card-body">
                                <ul class="list-group list-group-flush">
                                  <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    No. of Products
                                    <span>{{$totalitems}}</span>
                                  </li>
                                  <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Total Price
                                    <span>Rs. {{$totalprice}}</span>
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>Rs. 300.00</span>
                                  </li>
                                  <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                      <strong class="text-muted">You have to pay</strong>
                                    </div>
                                    <span><strong>Rs. {{$totalprice+300.00}}</strong></span>
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-muted" style="font-size: 13px;">
                                    &bull; You have to pay this amount when reciving your order.
                                  </li>
                                </ul>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>
              </form>
              
            </section>
          
    </body>
</html>