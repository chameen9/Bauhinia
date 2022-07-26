<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Home</title>

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

        <style>
          .progress {
            width: 150px;
            height: 150px;
            background: none;
            position: relative;
          }

          .progress::after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 6px solid #eee;
            position: absolute;
            top: 0;
            left: 0;
          }

          .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
          }

          .progress .progress-left {
            left: 0;
          }

          .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 6px;
            border-style: solid;
            position: absolute;
            top: 0;
          }

          .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
          }

          .progress .progress-right {
            right: 0;
          }

          .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
          }

          .progress .progress-value {
            position: absolute;
            top: 0;
            left: 0;
          }

          
        </style>
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
                    <a class="dropdown-item" href="{{ url('/employee/editprofile/'.$email.'') }}">Profile</a>
                   
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
                        <a href="{{url('/employee/home/'.$name.'/'.$email.'')}}" class="btn btn-primary"><i class="bi bi-house"></i><br> Home</a>
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
                        <a href="{{url('/employee/money/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-coin"></i><br> Money</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/tools/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-gear"></i><br> Tools</a>
                      @else
                        <a href="{{url('/employee/home/'.$name.'/'.$email.'')}}" class="btn btn-primary"><i class="bi bi-house"></i><br> Home</a>
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
                          <a href="{{url('/employee/money/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-coin"></i><br> Money</a>
                        @else
                          <a href="{{url('/employee/money/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary disabled"><i class="bi bi-coin"></i><br> Money</a>
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
                          
                          <div class="col-6">
                            <div class="shadow bg-white rounded">
                              <div class="row">
                                <div class="col-12">
                                  <h4 class="text-muted">&nbsp;Orders</h4>
                                  <hr>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <br>
                                  <br>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-4">
                                  <!-- Order Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$orderspercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-primary"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-primary"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h2 font-weight-bold">{{$orderspercentage}}<sup class="small">%</sup></div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-8">
                                  <div class="row">
                                    <div class="col-6">
                                      <p>Active Orders</p>
                                      <p>Shipped Orders</p>
                                      <p>Pending Orders</p>
                                      <p></p>
                                    </div>
                                    <div class="col-1">
                                      <p>:</p>
                                      <p>:</p>
                                      <p>:</p>
                                      <p></p>
                                    </div>
                                    <div class="col-4">
                                      <p align="right">{{$activeorderscount}}</p>
                                      <p align="right">{{$shippedorderscount}}</p>
                                      <p align="right">{{$pendingorderscount}}</p>
                                      <p></p>
                                    </div>
                                    <div class="col-1">
                                      <p></p>
                                      <p></p>
                                      <p></p>
                                      <p></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <br>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-6">
                            <div class="shadow bg-white rounded">
                              <div class="row">
                                <div class="col-12">
                                  <h4 class="text-muted">&nbsp;Stock Status</h4>
                                  <hr>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="row">
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 21px;" class="text-muted">Greater than 50</p>
                                    </div>
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 21px;" class="text-muted">Less than 50</p>
                                    </div>
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 21px;" class="text-muted">Less than 20</p>
                                    </div>
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 21px;" class="text-muted">Empty</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$greaterthan50stockpercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-success"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-success"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h2 font-weight-bold">{{$greaterthan50stockpercentage}}<sup class="small">%</sup></div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$lessthan50stockpercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-primary"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-primary"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h2 font-weight-bold">{{$lessthan50stockpercentage}}<sup class="small">%</sup></div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$lessthan20stockpercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-warning"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-warning"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h2 font-weight-bold">{{$lessthan20stockpercentage}}<sup class="small">%</sup></div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$emptystockpercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-danger"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-danger"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h2 font-weight-bold">{{$emptystockpercentage}}<sup class="small">%</sup></div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <br>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <br>
                            <br>
                          </div>
                        </div>

                        <div class="row">
                          
                          <div class="col-6">
                            <div class="shadow bg-white rounded">
                              <div class="row">
                                <div class="col-12">
                                  <h4 class="text-muted">&nbsp;Income Status</h4>
                                  <hr>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="row">
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 15px;" class="text-muted">This Month</p>
                                    </div>
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 15px;" class="text-muted">Last Month</p>
                                    </div>
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 15px;" class="text-muted">Other Months</p>
                                    </div>
                                    <div class="col-3">
                                      <br>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$thismonthorderspercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-primary"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-primary"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h2 font-weight-bold">{{$thismonthorderspercentage}}<sup class="small">%</sup></div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$lastmonthorderspercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-info"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-info"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h2 font-weight-bold">{{$lastmonthorderspercentage}}<sup class="small">%</sup></div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$othermonthsorderspercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-secondary"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-secondary"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h2 font-weight-bold">{{$othermonthsorderspercentage}}<sup class="small">%</sup></div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <div class="row">
                                    <div class="col-12">
                                      <p>Total Orders: <b>{{$allmonthsorderscount}}</b></p>
                                      <p>This Month: <b>{{$thismonthorderscount}}</b></p>
                                      <p>Last Month: <b>{{$lastmonthorderscount}}</b></p>
                                      <p>Other Months: <b>{{$othermonthsorderscount}}</b></p>
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <br>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-6">
                            <div class="shadow bg-white rounded">
                              <div class="row">
                                <div class="col-12">
                                  <h4 class="text-muted">&nbsp;Income Amounts</h4>
                                  <hr>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="row">
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 21px;" class="text-muted">Total</p>
                                    </div>
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 21px;" class="text-muted">This Month</p>
                                    </div>
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 21px;" class="text-muted">Last Month</p>
                                    </div>
                                    <div class="col-3">
                                      <p style="text-align: center; font-size: 21px;" class="text-muted">Other Months</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='100'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-success"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-success"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h6 font-weight-bold">Rs. {{$allmonthsorderssum}}</div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$thismonthorderssumpercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-primary"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-primary"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h6 font-weight-bold">Rs. {{$thismonthorderssum}}</div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$lastmonthorderssumpercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-info"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-info"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h6 font-weight-bold">Rs. {{$lastmonthorderssum}}</div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                <div class="col-3">
                                  <!-- Stock Progress bar -->
                                  <div class="progress mx-auto" data-value='{{$othermonthsorderssumpercentage}}'>
                                    <span class="progress-left">
                                      <span class="progress-bar border-secondary"></span>
                                    </span>
                                    <span class="progress-right">
                                      <span class="progress-bar border-secondary"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                      <div class="h6 font-weight-bold">Rs. {{$othermonthsorderssum}}</div>
                                    </div>
                                  </div>
                                  <!-- END -->
                                </div>
                                
                                
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <br>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        
                            
                        
                        
            </div>

        </div>
      </div>
              
      <script>
        $(function() {

          $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
              if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
              } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
              }
            }

          })

          function percentageToDegrees(percentage) {

            return percentage / 100 * 360

          }

        });
      </script>

    </body>
</html>