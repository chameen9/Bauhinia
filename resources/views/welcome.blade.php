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

      <div class="shadow p-0 mb-1 bg-white rounded">
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
                <!-- Drop Down -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Employee
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('/employee/signin') }}">Sign In</a>
                    <a class="dropdown-item" href="{{ url('/employee/signupconfirm') }}">Sign Up</a>
                  </div>
                </li>
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
                <a href="{{ url('/customer/signin') }}" class="btn btn-outline-primary btn-sm px-3 me-2" role="button">Sign In</a>
                <a href="{{ url('/customer/signup') }}" class="btn btn-primary btn-sm px-3 me-2" role="button">Sign Up for Free</a>
              </div>
            </div>
            <!-- Collapsible wrapper -->
          </div>
          <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
      </div>

      <br>

      <!--carousel-->
      <div class="border-bottom">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          
          <div class="carousel-inner">
            <div class="carousel-item active" data-mdb-interval="50">
              <img class="d-block w-100" src="{{URL::asset('/images/sc1.png')}}" alt="First slide">
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

      <!--categories container-->
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h5 align="center"><i>When human contracts are so quik. Fashion is instant language.</i></h5>
            <h6 align="center">- Miuccia Prada -</h6>
            <br>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="shadow p-3 mb-5 bg-white rounded">
              <div class="box-part text-center">
                <img src="{{URL::asset('/images/5.JPG')}}" width="300px" height="300px" class="img-fluid img-circle">
              <div class="title">
                <h5>Men's Collection</h5>
              </div>
              <div class="text">
                <span></span>
              </div>
              <a class="btn btn-outline-info" role="button" data-toggle="modal" data-target="#MsgModal">Shop Now</a>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="shadow p-3 mb-5 bg-white rounded">
              <div class="box-part text-center">
                <img src="{{URL::asset('/images/4.JPG')}}" width="300px" height="300px" class="img-fluid">
              <div class="title">
                <h5>Women's Collection</h5>
              </div>
              <div class="text">
                <span></span>
              </div>
              <a class="btn btn-outline-purple"  role="button" data-toggle="modal" data-target="#MsgModal">Shop Now</a>
              </div>
            </div>
          </div>	

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="shadow p-3 mb-5 bg-white rounded">
              <div class="box-part text-center">
                <img src="{{URL::asset('/images/8.JPG')}}" width="300px" height="300px" class="img-fluid img-circle">
              <div class="title">
                <h5>Kid's Collection</h5>
              </div>
              <div class="text">
                <span></span>
              </div>
              <a class="btn btn-outline-dark"  role="button" data-toggle="modal" data-target="#MsgModal">Shop Now</a>
              </div>
            </div>
          </div>	

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="shadow p-3 mb-5 bg-white rounded">
              <div class="box-part text-center">
                <img src="{{URL::asset('/images/9.JPG')}}" width="300px" height="300px" class="img-fluid img-circle">
              <div class="title">
                <h5>Personal Care</h5>
              </div>
              <div class="text">
                <span></span>
              </div>
              <a class="btn btn-outline-pink"  role="button" data-toggle="modal" data-target="#MsgModal">Shop Now</a>
              </div>
            </div>
          </div>	

        </div>

        <div class="row">
          <div class="col-12">
            <h3 align="center" class="display-6">Categories To Shop</h3>
            <br>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="" data-toggle="modal" data-target="#MsgModal"><img src="{{URL::asset('/images/8.JPG')}}" class="img-circle" width="300px" height="auto" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="" data-toggle="modal" data-target="#MsgModal"><img src="{{URL::asset('/images/8.JPG')}}" width="300px" height="auto" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="" data-toggle="modal" data-target="#MsgModal"><img src="{{URL::asset('/images/8.JPG')}}" width="300px" height="auto" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="" data-toggle="modal" data-target="#MsgModal"><img src="{{URL::asset('/images/8.JPG')}}" width="300px" height="auto" alt=""></a>
          </div>

        </div>

        <div class="row">
          <div class="col-12">
            <br>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="" data-toggle="modal" data-target="#MsgModal"><img src="{{URL::asset('/images/8.JPG')}} " width="300px" height="auto" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="" data-toggle="modal" data-target="#MsgModal"><img src="{{URL::asset('/images/8.JPG')}} " width="300px" height="auto" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="" data-toggle="modal" data-target="#MsgModal"><img src="{{URL::asset('/images/8.JPG')}} " width="300px" height="auto" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="" data-toggle="modal" data-target="#MsgModal"><img src="{{URL::asset('/images/8.JPG')}} " width="300px" height="auto" alt=""></a>
          </div>

        </div>

        <div class="row">

          <div class="col-12">
            <br>
          </div>

          <div class="col-12">
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="box-part text-center">
              <img src="{{URL::asset('/images/gv.png')}}" alt="Great Value" width="200px" height="200px" class="img-fluid">
              <div class="title">
                <h4>Great Value</h4>
              </div>
              <hr>
              <div class="text">
                <p>We offer competitive price on over 100 000 items.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="box-part text-center">
              <img src="{{URL::asset('/images/iwd.png')}}" alt="Islandwide Delevery" width="200px" height="200px" class="img-fluid">
              <div class="title">
                <h4>Islandwide Delivery</h4>
              </div>
              <hr>
              <div class="text">
                <p>We deliver to every province in Sri Lanka.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="box-part text-center">
              <img src="{{URL::asset('/images/swc.png')}}" alt="Shop with Confidence" width="200px" height="200px" class="img-fluid">
              <div class="title">
                <h4>Shop with Confidence</h4>
              </div>
              <hr>
              <div class="text">
                <p>Our buyer protection policy covers your entire purchase journey.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="box-part text-center">
              <img src="{{URL::asset('/images/cod.png')}}" alt="Cash on Delevery" width="200px" height="200px" class="img-fluid">
              <div class="title">
                <h4>Cash on Delivery</h4>
              </div>
              <hr>
              <div class="text">
                <p>You can pay for your product in your doorsteps.</p>
              </div>
            </div>
          </div>

        </div>

      </div>

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

    </body>
</html>