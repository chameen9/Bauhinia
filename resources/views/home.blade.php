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
                <!-- Cart -->
                @if($count == null)
                  <div class="nav-item">
                    <a role="button" data-toggle="modal" data-target="#cartmodal"  class="position-relative">
                      <h4><i class="bi bi-cart"></i></h4><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                    </a>
                  </div>
                @else
                  <div class="nav-item">
                    <a href="{{ url('/customer/cart/'.$email.'') }}" role="button" class="position-relative">
                      <h4><i class="bi bi-cart-fill"></i></h4><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$count}}</span>
                    </a>
                  </div>
                @endif
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
                    @if($activeordercount == null)
                      <a class="dropdown-item disabled" href="{{ url('/customer/orders/'.$email.' ') }}">Orders</a>
                    @else
                      <a class="dropdown-item" href="{{ url('/customer/orders/'.$email.' ') }}">Orders <span class="badge rounded-pill badge-notification bg-primary">{{$activeordercount}}</span></a>
                    @endif
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
                
                <div class="card-body">
                  Categories
                  <hr>
                  <a href="#newarrivals" class="text-decoration-none" style="font-size: 15px;">New Arrivals</a><br>
                  <a href="#highend" class="text-decoration-none" style="font-size: 15px;">High end fashion store</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Fast fashion brands</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Casual clothing brands</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Sport clothing store</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Travel clothing store</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Kids clothing store</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Wedding dresses</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Swimming suits</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Suit store</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Jeans shop</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Bags & Backpacks store</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Saree store</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">T-Shirts store</a><br>
                  <a href="" class="text-decoration-none" style="font-size: 15px;">Sarongs store</a><br>
                  
                </div>
              </div>
            </div>
            
          </div>

          <div class="col-lg-10 col-md-10 col-sm-8">
                <!--breadcrumb-->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <!--<li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>-->
                  </ol>
                </nav>
                <!--breadcrumb-->

               
  
                <!--carousel-->
                <div class="border-bottom" id="carousel">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-mdb-interval="50">
                        <img class="d-flex w-100" src="{{URL::asset('/images/sc1.png')}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                          <h5></h5>
                          <p></p>
                        </div>
                      </div>
                      <div class="carousel-item" data-mdb-interval="50">
                        <img class="d-block w-100" src="{{URL::asset('/images/sc2.png')}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                          <h5></h5>
                          <p></p>
                        </div>
                      </div>
                      <!--<div class="carousel-item" data-mdb-interval="50">
                        <img class="d-block w-100" src="{{URL::asset('/images/sc3.png')}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                          <h5></h5>
                          <p></p>
                        </div>
                      </div>-->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                  </div>
                </div>
  
                <br>

              
                <!--newarrivals-->
                <section id="newarrivals">
                  <h4 class="text-muted">New Arrivals</h4> 
                  <span><a href="#top" class="link link-dark"><i class="bi bi-arrow-up-circle"></i></a></span>
                  <span><a href="#highend" class="link link-dark"><i class="bi bi-arrow-down-circle"></i></a></span>
                  <span>&nbsp;</span>
                  <span><a href="#top" class="link link-dark"><i class="bi bi-arrow-up-square-fill"></i></a></span>
                <div class="row">

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#LV123456" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/LV123456.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Levi's - Original fit Men's jeans</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 4999.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#LV123457" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/LV123457.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Levi's - Slim fit Men's jeans</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 4499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#LV123458" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/LV123458.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Levi's - Athletic Taper Men's jeans</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 4999.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#LV123459" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/LV123459.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Levi's - Skinny Taper Men's jeans</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 5499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                </div>
                <!--end row 1-->

                <!--row 2-->
                <div class="row">

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#TH123456" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/TH123456.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Tommy Hilfiger - Regular Fit Logo Polo</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 3499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#TH123457" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/TH123457.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Tommy Hilfiger - Regular Fit Polo</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 3499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#BG123456" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/BG123456.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Aldo - Grydith Black Wallet</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 11499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#BG123457" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/BG123457.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Aldo - Cityverse HandBag</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 12499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  
                </div>
                <!--end row 2-->
                </section>
                <!--end newarrivals-->

                <!--highend-->
                <section id="highend">
                  <h4 class="text-muted">High end Fashion Store</h4>
                  <span><a href="#newarrivals" class="link link-dark"><i class="bi bi-arrow-up-circle"></i></a></span>
                  <span><a href="#fastfasion" class="link link-dark"><i class="bi bi-arrow-down-circle"></i></a></span>
                  <span>&nbsp;</span>
                  <span><a href="#top" class="link link-dark"><i class="bi bi-arrow-up-square-fill"></i></a></span>

                <div class="row">

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#HE123456" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/HE123456.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">DIOR- Two Button Suit</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 74999.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#HE123457" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/HE123457.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">DIOR- Classic Suit</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 87499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#HE123458" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/HE123458.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">DIOR - Macrocannage Bar Jacket</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 24999.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#HE123459" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/HE123459.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">DIOR- Short Sleeved Jacket</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 54999.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                </div>
                <!--end row 1-->

                <!--row 2-->
                <div class="row">

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#HE123460" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/HE123460.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Prada - Short-sleeved Linen Shirt</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 29999.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#HE123461" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/HE123461.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Prada - Single-breasted Jacket</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 44499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#HE123462" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/HE123462.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Prada - Single-breasted Wool Jacket</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 44499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#HE123463" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/HE123463.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Prada - Single-breasted Cotton Jacket</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 44499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  
                </div>
                <!--end row 2-->
                </section>
                <!--end highend-->
              
                
                <!--fastfasion-->
                <section id="fastfasion">
                  <h4 class="text-muted">High end Fashion Store</h4>
                  <span><a href="#highend" class="link link-dark"><i class="bi bi-arrow-up-circle"></i></a></span>
                  <span><a href="#fastfasion" class="link link-dark"><i class="bi bi-arrow-down-circle"></i></a></span>
                  <span>&nbsp;</span>
                  <span><a href="#top" class="link link-dark"><i class="bi bi-arrow-up-square-fill"></i></a></span>

                <div class="row">

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#LV123456" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/LV123456.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Levi's - Original fit Men's jeans</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 4999.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#LV123457" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/LV123457.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Levi's - Slim fit Men's jeans</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 4499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#LV123458" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/LV123458.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Levi's - Athletic Taper Men's jeans</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 4999.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#LV123459" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/LV123459.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Levi's - Skinny Taper Men's jeans</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 5499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                </div>
                <!--end row 1-->

                <!--row 2-->
                <div class="row">

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#TH123456" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/TH123456.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Tommy Hilfiger - Regular Fit Logo Polo</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 3499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#TH123457" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/TH123457.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Tommy Hilfiger - Regular Fit Polo</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 3499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#BG123456" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/BG123456.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Aldo - Grydith Black Wallet</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 11499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="shadow-sm p-1 mb-5 bg-body rounded">
                      <a data-toggle="modal" data-target="#BG123457" role="button">

                        <div class="box-part text-center">
                          <img src="{{URL::asset('/products/BG123457.png')}}" width="280px" height="380px" class="centerd-image">
                          <div class="title">
                            <h6 style="text-align: start;" class="text-muted">Aldo - Cityverse HandBag</h6>
                          </div>
                          <div class="text" style="text-align: start;">
                            <b>Rs. 12499.99</b>
                          </div>
                        </div>

                      </a>
                    </div>
                  </div>

                  
                </div>
                <!--end row 2-->
                </section>
                <!--end fastfasion-->
  
                
  
            </div>
  
              
  
              
          </div>
        </div>
      </div>
      

      <br>
      <br>
      <br>

      <!-- Footer -->
      <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
          <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
              <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
              <a href="https://facebook.com/BauhiniaLK" class="me-4 text-reset"><i class="bi bi-facebook"></i></a>
              <a href="https://twitter.com/BauhiniaLK" class="me-4 text-reset"><i class="bi bi-twitter"></i></a>
              <a href="https://google.com/BauhiniaLK" class="me-4 text-reset"><i class="bi bi-google"></i></a>
              <a href="https://instagram.com/bauhinia_lk" class="me-4 text-reset"><i class="bi bi-instagram"></i></a>
              <a href="https://linkedin.com/BauhiniaLK" class="me-4 text-reset"><i class="bi bi-linkedin"></i></a>
            </div>
            <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
              <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">Our Company</h6>
                    <p class="text-justify">
                      Bauhinia is one of the emerging retail brand clothing store among the retail industries. We provide wide range of clothing, footwear and accessories to all customers at an affordable price yet with a splendid quality. We have all kind of items for Men, Women & Kids for a family shopping with recent fashion trend and also we are introducing new designs for all seasons.
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Info
                    </h6>
                    <p>
                      <a href="{{ url('/aboutus') }}" class="text-reset">About Us</a>
                    </p>
                    <p>
                      Careers
                    </p>
                    <p>
                      Be a Supllier
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Help
                    </h6>
                    <p>
                      <a href="{{ url('/contactus') }}" class="text-reset">Contact Us</a>
                    </p>
                    <p>
                      FAQ
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Contact
                    </h6>
                    <p><i class="bi bi-geo-alt"></i> Galle, Southern Province, Sri Lanka.</p>
                    <p>
                      <i class="bi bi-envelope"></i>
                      info@bauhinia.lk
                    </p>
                    <p><i class="bi bi-telephone"></i> +94 76 078 5638</p>
                    <p><i class="bi bi-whatsapp"></i> +94 71 401 7271</p>
                  </div>
                  <!-- Grid column -->
                </div>
                <!-- Grid row -->
              </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
              Bauhinia &copy; 2022. All Rights Reserved. <br>
              Designed by: 
              <a class="text-reset" href="http://akl-it.com/home/">AKL Software</a>
            </div>
            <!-- Copyright -->
          </footer>
          <!-- Footer -->

          <!-- Modal -->
          <div class="modal fade" id="MsgModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">You need to Sign In first !</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p>To view or browse more products, you should sign in with your email and password. if you don't have an account yet, you can create one using these links.</p>
                  
                  <div class="row d-flex justify-content-center">
                    <div class="btn-group" role="group">
                      <a href="{{ url('/customer/signin') }}" class="btn btn-outline-primary" role="button">Sign In</a>
                      <a href="{{ url('/customer/signup') }}" class="btn btn-primary" role="button">Sign Up</a>
                    </div>
                  </div>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-modal-->

          <!-- LV123456 -->
          <div class="modal fade" id="LV123456" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Levi's Original fit Men's Jeans</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/LV123456.png')}}" width="600px" height="auto" class="img-fluid">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>LV123456</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Levi's Original fit Men's Jeans</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Levi's</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                              <option>XL</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Dark Blue</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 4999.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="LV123456">
                            <input type="hidden" class="from-control" name="price" value="4999.99">
                            <input type="hidden" class="from-control" name="product_name" value="Levi's Original fit Men's Jeans">
                            <input type="hidden" class="from-control" name="brand" value="Levi's">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-LV123456-->


          <!-- LV123457 -->
          <div class="modal fade" id="LV123457" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Levi's Slim fit Men's Jeans</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/LV123457.png')}}" width="600px" height="auto" class="img-fluid">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>LV123457</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Levi's Slim fit Men's Jeans</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Levi's</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                              <option>XL</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Light Blue</option>
                              <option>Dark Blue</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 4999.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="LV123457">
                            <input type="hidden" class="from-control" name="price" value="4999.99">
                            <input type="hidden" class="from-control" name="product_name" value="Levi's Slim fit Men's Jeans">
                            <input type="hidden" class="from-control" name="brand" value="Levi's">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-LV123457-->


          <!-- LV123458 -->
          <div class="modal fade" id="LV123458" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Levi's Athletic Taper Men's Jeans</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/LV123458.png')}}" width="600px" height="auto" class="img-fluid">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>LV123458</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Levi's Athletic Taper Men's Jeans</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Levi's</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                              <option>XL</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Light Blue</option>
                              <option>Dark Blue</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 4999.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="LV123458">
                            <input type="hidden" class="from-control" name="price" value="4999.99">
                            <input type="hidden" class="from-control" name="product_name" value="Levi's Athletic Taper Men's Jeans">
                            <input type="hidden" class="from-control" name="brand" value="Levi's">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-LV123458-->

          <!-- LV123459 -->
          <div class="modal fade" id="LV123459" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Levi's Skinny Taper Men's jeans</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/LV123459.png')}}" width="600px" height="auto" class="img-fluid">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>LV123459</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Levi's Skinny Taper Men's jeans</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Levi's</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                              <option>XL</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Light Blue</option>
                              <option>Dark Blue</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 5499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="LV123459">
                            <input type="hidden" class="from-control" name="price" value="5499.99">
                            <input type="hidden" class="from-control" name="product_name" value="Levi's Athletic Taper Men's Jeans">
                            <input type="hidden" class="from-control" name="brand" value="Levi's">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-LV123459-->

          <!-- TH123456 -->
          <div class="modal fade" id="TH123456" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tommy Hilfiger - Regular fit Logo Polo</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/TH123456.png')}}" width="600px" height="auto" class="img-fluid">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>TH123456</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Tommy Hilfiger - Regular fit Logo Polo</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Tommy Hilfiger</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                              <option>XL</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Black</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 3499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="TH123456">
                            <input type="hidden" class="from-control" name="price" value="3499.99">
                            <input type="hidden" class="from-control" name="product_name" value="Tommy Hilfiger - Regular fit Logo Polo">
                            <input type="hidden" class="from-control" name="brand" value="Tommy Hilfiger">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-TH123456-->

          <!-- TH123457 -->
          <div class="modal fade" id="TH123457" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tommy Hilfiger - Regular fit Polo</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/TH123457.png')}}" width="600px" height="auto" class="img-fluid">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>TH123457</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Tommy Hilfiger - Regular fit Polo</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Tommy Hilfiger</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                              <option>XL</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Red</option>
                              <option>Navy Blue</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 3499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="TH123457">
                            <input type="hidden" class="from-control" name="price" value="3499.99">
                            <input type="hidden" class="from-control" name="product_name" value="Tommy Hilfiger - Regular fit Polo">
                            <input type="hidden" class="from-control" name="brand" value="Tommy Hilfiger">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-TH123457-->

          <!-- BG123456 -->
          <div class="modal fade" id="BG123456" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Aldo - Grydith Black Wallet</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/BG123456.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>BG123456</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Aldo - Grydith Black Wallet</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Aldo</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Black</option>
                              <option>Dark Gray</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 11499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="BG123456">
                            <input type="hidden" class="from-control" name="price" value="11499.99">
                            <input type="hidden" class="from-control" name="product_name" value="Aldo - Grydith Black Wallet">
                            <input type="hidden" class="from-control" name="brand" value="Aldo">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-BG123456-->

          <!-- BG123457 -->
          <div class="modal fade" id="BG123457" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Aldo - Cityverse Handbag</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/BG123457.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>BG123457</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Aldo - Cityverse Handbag</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Aldo</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Black & White</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 12499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="BG123457">
                            <input type="hidden" class="from-control" name="price" value="12499.99">
                            <input type="hidden" class="from-control" name="product_name" value="Aldo - Cityverse Handbag">
                            <input type="hidden" class="from-control" name="brand" value="Aldo">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-BG123457-->


          <!-- HE123456 -->
          <div class="modal fade" id="HE123456" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">DIOR- Two Button Suit</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/HE123456.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>HE123456</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>DIOR- Two Button Suit</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>DIOR</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Black</option>
                              <option>Dark Blue</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 74999.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="HE123456">
                            <input type="hidden" class="from-control" name="price" value="74999.99">
                            <input type="hidden" class="from-control" name="product_name" value="DIOR- Two Button Suit">
                            <input type="hidden" class="from-control" name="brand" value="DIOR">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-HE123456-->


          <!-- HE123457 -->
          <div class="modal fade" id="HE123457" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">DIOR- Classic Suit</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/HE123457.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>HE123457</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>DIOR- Classic Suit</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>DIOR</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Black</option>
                              <option>Dark Blue</option>
                              <option>Light Blue</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 87499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="HE123457">
                            <input type="hidden" class="from-control" name="price" value="87499.99">
                            <input type="hidden" class="from-control" name="product_name" value="DIOR- Classic Suit">
                            <input type="hidden" class="from-control" name="brand" value="DIOR">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-HE123457-->


          <!-- HE123458 -->
          <div class="modal fade" id="HE123458" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">DIOR - Macrocannage Bar Jacket</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/HE123458.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>HE123458</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>DIOR - Macrocannage Bar Jacket</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>DIOR</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Black</option>
                              <option>Dark Gray</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 24999.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="HE123458">
                            <input type="hidden" class="from-control" name="price" value="24999.99">
                            <input type="hidden" class="from-control" name="product_name" value="DIOR - Macrocannage Bar Jacket">
                            <input type="hidden" class="from-control" name="brand" value="DIOR">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-HE123458-->


          <!-- HE123459 -->
          <div class="modal fade" id="HE123459" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">DIOR- Short Sleeved Jacket</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/HE123459.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>HE123459</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>DIOR- Short Sleeved Jacket</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>DIOR</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Black</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 54999.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="HE123459">
                            <input type="hidden" class="from-control" name="price" value="54999.99">
                            <input type="hidden" class="from-control" name="product_name" value="DIOR- Short Sleeved Jacket">
                            <input type="hidden" class="from-control" name="brand" value="DIOR">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-HE123459-->


          <!-- HE123460 -->
          <div class="modal fade" id="HE123460" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Prada - Short-sleeved Linen Shirt</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/HE123460.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>HE123460</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Prada - Short-sleeved Linen Shirt</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Prada</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>White</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 29999.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="HE123460">
                            <input type="hidden" class="from-control" name="price" value="29999.99">
                            <input type="hidden" class="from-control" name="product_name" value="Prada - Short-sleeved Linen Shirt">
                            <input type="hidden" class="from-control" name="brand" value="Prada">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-HE123460-->

          <!-- HE123461 -->
          <div class="modal fade" id="HE123461" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Prada - Single-breasted Jacket</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/HE123461.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>HE123461</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Prada - Single-breasted Jacket</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Prada</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Navy Blue</option>
                              <option>Dark Blue</option>
                              <option>Black</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 44499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="HE123461">
                            <input type="hidden" class="from-control" name="price" value="44499.99">
                            <input type="hidden" class="from-control" name="product_name" value="Prada - Single-breasted Jacket">
                            <input type="hidden" class="from-control" name="brand" value="Prada">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-HE123461-->


          <!-- HE123462 -->
          <div class="modal fade" id="HE123462" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Prada - Single-breasted Wool Jacket</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/HE123462.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>HE123462</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Prada - Single-breasted Wool Jacket</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Prada</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Dark Blue</option>
                              <option>Black</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 44499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="HE123462">
                            <input type="hidden" class="from-control" name="price" value="44499.99">
                            <input type="hidden" class="from-control" name="product_name" value="Prada - Single-breasted Wool Jacket">
                            <input type="hidden" class="from-control" name="brand" value="Prada">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-HE123462-->


          <!-- HE123463 -->
          <div class="modal fade" id="HE123463" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Prada - Single-breasted Cotton Jacket</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/home/addtocart') }}" method="post">
                  {{csrf_field()}} {{ method_field('POST') }}
                    <div class="row">
                      <div class="col-5">
                        <img src="{{URL::asset('/products/HE123463.png')}}" width="600px" height="auto" class="centerd-image">
                      </div>
                      <div class="col-7">
                        <div class="row">
                          <div class="col-3">
                            <label>Item Id</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>HE123463</label>  <!--id-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Item Name</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Prada - Single-breasted Cotton Jacket</label> <!--name-->
                          </div>
                        </div>
  
                        <br>
  
                        <div class="row">
                          <div class="col-3">
                            <label>Brand</label>
                          </div>
                          <div class="col-1">
                            <label>:</label>
                          </div>
                          <div class="col-8">
                            <label>Prada</label> <!--Brand-->
                          </div>
                        </div>
  
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p class="text-muted"><b>Select your details</b></p>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-4">
                            <label>Size :</label>
                          </div>
                          <div class="col-4">
                            <label>Colour :</label>
                          </div>
                          <div class="col-4">
                            <label>Quantity :</label>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-4">
                            <select class="form-control" name="size" required>
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Large</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" name="colour" required>
                              <option>Cream</option>
                              <option>Light Gray</option>
                              <option>Dark Gray</option>
                            </select>
                          </div>
                          <div class="col-4">
                            <input type="number" class="form-control" name="qty" min="1" step="1" value="1" required max="10">
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-8">
                          </div>
                          <div class="col-4">
                            <h5 class="text-muted">Rs. 44499.99</h5>
                          </div>
                        </div>
                        <br>

                        <!--hidden inputs-->
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" class="from-control" name="cus_email" value="{{$email}}">
                            <input type="hidden" class="from-control" name="product_id" value="HE123463">
                            <input type="hidden" class="from-control" name="price" value="44499.99">
                            <input type="hidden" class="from-control" name="product_name" value="Prada - Single-breasted Cotton Jacket">
                            <input type="hidden" class="from-control" name="brand" value="Prada">
                          </div>
                        </div>
                        <!--hidden inputs-->

                        <div class="row d-flex justify-content-center">
                          <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to cart</button>
                          </div>
                        </div>

                        
  
                      </div>
                    </div>

                  </form>

                </div>
                
              </div>
            </div>
          </div>
          <!--end-HE123463-->


          <!-- cart modal -->
          <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Your Cart is Empty !</h5>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-12">
                      <p class="text-muted">Please add items to your cart to show here.</p>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <!--end cart-->

    </body>
</html>