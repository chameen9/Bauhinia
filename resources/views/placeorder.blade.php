<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Your Cart</title>

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
                    <!-- Cart 
                    @if($count == null)
                      <div class="nav-item">
                        <a role="button" data-toggle="modal" data-target="#cartmodal"  class="position-relative">
                          <h4><i class="bi bi-cart"></i></h4><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                        </a>
                      </div>
                    @else
                      <div class="nav-item">
                        <a href="{{ url('/customer/viewcart') }}" role="button" class="position-relative">
                          <h4><i class="bi bi-cart-fill"></i></h4><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$count}}</span>
                        </a>
                      </div>
                    @endif
                     Cart -->
    
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
                            <h5 class="mb-0">Your Cart - {{$count}} items</h5>
                          </div>
                          <div class="card-body">
                          

                            @foreach($carts as $cart)
                            <!-- Single item -->
                            <div class="row">
                              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                  <img src="{{URL::asset('/products/'.$cart->product_id.'.png')}}"
                                    class="w-100 height: 100px; img-fluid"/>
                                  <a href="">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                  </a>
                                </div>
                                <!-- Image -->
                              </div>
                
                              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <input type="hidden" name="key[]" value="{{$cart->cp_id}}">
                                <input type="hidden" name="product_id[]" value="{{$cart->product_id}}">
                                <input type="hidden" name="email" value="{{$email}}">
                                <input type="hidden" name="primary_contact" value="{{$primary_contact}}">
                                <input type="hidden" name="secondary_contact" value="{{$secondary_contact}}">
                                <input type="hidden" name="delivery_address" value="{{$delivery_address}}">
                                <p><strong>{{$cart->product_name}}</strong></p>
                                <input type="hidden" name="product_name[]" value="{{$cart->product_name}}">
                                <p>Color: {{$cart->colour}}</p>
                                <input type="hidden" name="colour[]" value="{{$cart->colour}}">
                                <p>Size: {{$cart->size}}</p>
                                <input type="hidden" name="size[]" value="{{$cart->size}}">
                                <a href="{{url('/customer/cart/updateitem/'.$email.'/'.$cart->product_id.'/'.$cart->colour.'/'.$cart->size.' ')}}" 
                                  role="button" class="btn btn-primary btn-sm mb-2" data-mdb-toggle="tooltip" title="Update Quantity">
                                  <i class="bi bi-arrow-repeat"></i>
                                </a>
                                
                                <a href="{{url('/customer/cart/deleteitem/'.$email.'/'.$cart->product_id.'/'.$cart->colour.'/'.$cart->size.' ')}}" 
                                  role="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip" title="Remove Item">
                                  <i class="bi bi-trash"></i>
                                </a>
  
                                <!-- Data -->
                              </div>
                
                              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="row">
                                    <!-- Quantity -->
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                                                
                                      <div class="form-outline">
                                        <label class="form-label">Quantity :</label>
                                        <input type="hidden" name="qty[]" value="{{$cart->qty}}">
                                        <label class="form-label">{{$cart->qty}}</label>
                                      </div>
                                      
  
                                    </div>
                                    <!-- Quantity -->
                                </div>
                                <div class="row">
                                  <div class="col-12">
                                      <!-- Price -->
                                      <p class="text-start text-muted">
                                        Item Price : Rs. {{$cart->price}}
                                      </p>
                                      <!-- Price -->
                                  </div>
                                </div>
                                
                                <input type="hidden" value="{{$totalprice = $totalprice+$cart->price*$cart->qty}}"></input>
                                
                                
                              </div>
                            </div>
  
                            <hr class="my-4" />
                            <!-- Single item -->
                            @endforeach

                          
                          </div>
  
                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-12">
                          <div class="shadow p-0 mb-1 bg-white rounded">
                            <div class="card mb-4">
                              <div class="card-header py-3">
                                <h5 class="mb-0">Summary</h5>
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
                                      <strong class="text-muted">Total amount</strong>
                                    </div>
                                    <span><strong>Rs. {{$totalprice+300.00}}</strong></span>
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-muted" style="font-size: 13px;">
                                    &bull; Please make sure about your selected items.
                                  </li>
                                </ul>
                                <button type="submit" class="btn btn-primary btn-block">
                                  Confirm Order
                                </button>

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