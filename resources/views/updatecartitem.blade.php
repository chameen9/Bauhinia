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
                <a class="navbar-brand me-2" href="{{ url('/customer/cart/'.$email.'') }}">
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
          <br>
          <form action="{{url('/customer/cart/updateitem/updateqty')}}" method="post">
            {{csrf_field()}}
            <div class="row" style="justify-content: center;">
                <div class="col-8">
                    <div class="shadow p-0 mb-0 bg-white rounded">
                        <table class="table table-primary">
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Colour</th>
                            <th>Size</th>
                            <th>Product Price</th>
                            <th>Quantity</th>

                            <tr>
                                <td>{{$product_id}}</td>
                                <td>{{$product_name}}</td>
                                <td>{{$colour}}</td>
                                <td>{{$size}}</td>
                                <td>Rs. {{$price}}</td>
                                <td>
                                    <input type="number" name="newqty" value="{{$qty}}" class="form-control" style="width: 70px;" min="1" max="100">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                  &nbsp;
                </div>
                <div class="col-2 justify-content-center">
                    <input type="hidden" name="email" class="form-control" value="{{$email}}">
                    <input type="hidden" name="product_id" class="form-control" value="{{$product_id}}">
                    <input type="hidden" name="colour" class="form-control" value="{{$colour}}">
                    <input type="hidden" name="size" class="form-control" value="{{$size}}">

                   
                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-repeat"></i> Update</button>

                </div>
                <div class="col-5">
                  &nbsp;
                </div>
                    
              </div>
            </div>
        </form>
    </body>
</html>