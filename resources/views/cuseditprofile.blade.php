<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Profile</title>

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

          <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <br>
                </div>
                <div class="col-8">
                    <div class="shadow bg-white rounded">
                        <form action="{{url('/customer/save/profile')}}" method="post">
                            {{csrf_field()}}
                            <div class="card p-1" style="border: 1;">
                                @foreach($customers as $customer)
                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="text-muted">Your Info</h5>
                                        <hr>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Email</label>
                                        <input type="text" name="email" readonly tabindex="-1" value="{{$customer->email}}" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{$customer->name}}" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <br>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Gender</label>
                                        <input type="text" name="gender" value="{{$customer->gender}}" class="form-control" required>
                                    </div><div class="col-4">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="text-muted">Password</h5>
                                        <hr>
                                    </div>
                                    <div class="col-4">
                                        <label >Current Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" name="current_password" required id="current_password" value="{{$customer->password}}" class="form-control">
                                            <div class="input-group-append">
                                              <span class="input-group-text"><a type="button" onclick="passwordToggle1()"><i class="bi bi-eye"></i></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <br>
                                    </div>
                                    <div class="col-4">
                                        <label >New Password</label>
                                        
                                        <div class="input-group mb-3">
                                            <input type="password" name="new_password" required id="new_password" value="{{$customer->password}}" class="form-control">
                                            <div class="input-group-append">
                                              <span class="input-group-text"><a type="button" onclick="passwordToggle2()"><i class="bi bi-eye"></i></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label >Confirm Password</label>
                                        
                                        <div class="input-group mb-3">
                                            <input type="password" name="confirm_password" required id="confirm_password" value="{{$customer->password}}" class="form-control">
                                            <div class="input-group-append">
                                              <span class="input-group-text"><a type="button" onclick="passwordToggle3()"><i class="bi bi-eye"></i></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="text-muted">Delivery Information</h5>
                                        <hr>
                                    </div>
                                    <div class="col-8">
                                        <label for="">Delivery Address</label>
                                        <input type="text" name="delivery_address" required id="delivery_address" value="{{$customer->delivery_address}}" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <br>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Primary Contact Number</label>
                                        <input type="tel" name="primary_contact" required id="primary_contact" value="{{$customer->primary_contact_number}}" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label for="">Secondary Contact Number</label>
                                        <input type="tel" name="secondary_contact" required id="secondary_contact" value="{{$customer->secondary_contact_number}}" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="text-muted">Submit</h5>
                                        <hr>
                                    </div>
                                    <div class="col-8" style="justify-content: center; text-align: center;">
                                        <input type="hidden" name="name" value="{{$name}}">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-upload"></i> Save Your Information</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2">
                    @if($message = Session::get('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{$message}}
                            <a href="{{ url('/customer/home/'.$email.'') }}"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a></button>
                        </div>
                    @else
                        <br>
                    @endif
                    @if(count($errors)>0)
                        <div class="alert alert-warning alert-dismissible fade show">
                            <ol>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                        </div>
                    @else
                        <br>
                    @endif

                </div>
            </div>
          </div>
          <script>
            function passwordToggle1() {
                var x = document.getElementById("current_password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function passwordToggle2() {
                var x = document.getElementById("new_password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function passwordToggle3() {
                var x = document.getElementById("confirm_password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
          </script>
          
    </body>
</html>