<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Tools</title>

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
                          <a href="{{url('/employee/money/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-coin"></i><br> Money</a>
                          <br>
                          <br>
                          <a href="{{url('/employee/tools/'.$name.'/'.$email.'')}}" class="btn btn-primary"><i class="bi bi-gear"></i><br> Tools</a>
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

            <div class="col-lg-11 col-md-11 col-sm-9">
             
                <div class="row">
                    <div class="col-6">
                        <div class="shadow bg-white rounded">
                            <div class="card p-1" style="border: 0;">
                                <h4 class="card-header">Employees</h4>
                                <br>
                                <h6 class="text-muted">Add an Employee</h6>
                                <br>
                                <form action="{{url('employee/toolsaddanemployee')}}" method="post">
                                {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" >Employee ID : </span>
                                                </div>
                                                <input type="text" required name="id" class="form-control" placeholder="BHC-123456">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">Department : </span>
                                                </div>
                                                <select name="department" required id="" aria-placeholder="Department" class="form-control">
                                                    <option value="Accounting">Accounting</option>
                                                    <option value="Inventory">Inventory</option>
                                                    <option value="Production">Production</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" >Email : </span>
                                                </div>
                                                <input type="email" required name="email" id="" placeholder="name@bauhinia.lk" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" >Authentication Level : </span>
                                                </div>
                                                <input type="number" required name="auth_level" id="" value="4" min="1" max="4" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <br>
                                        </div>
                                        <div class="col-4">
                                            
                                                <input type="hidden" name="useremail" value="{{$email}}">
                                                <input type="hidden" name="username" value="{{$name}}">
                                                <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus"></i> Add Employee</button>
                                                
                                        </div>
                                        <div class="col-4">
                                           <br>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                
                                <h6 class="text-muted">Employees</h6>
                                <table>
                                  <thead style="background-color: #CFE2FF;">
                                        <th width="7px"></th>
                                        <th style="text-align: center;">ID</th>
                                        <th width="7px"></th>
                                        <th width="20px"></th>
                                        <th width="7px"></th>
                                        <th style="text-align: center;">Level</th>
                                        <th width="7px"></th>
                                        <th style="text-align: center;">Email</th>
                                        <th width="20px"></th>
                                        <th width="20px"></th>
                                        <th width="70px"></th>
                                        <th style="text-align: center;">Role</th>
                                        <th width="7px"></th>
                                        <th width="70px"></th>
                                        <th width="20px"></th>
                                        <th width="20px"></th>
                                        <th width="20px"></th>
                                        <th style="text-align: center;">Department</th>
                                    </thead>
                                </table>
                                <div class="scrollsec">
                                  <table class="table">
  
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$employee->id}}</td>
                                            <td>{{$employee->auth_level}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->role}}</td>
                                            <td align="center">{{$employee->department}}</td>
                                        </tr>
                                        @endforeach
                                   
                                  </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="shadow bg-white rounded">
                            <div class="card p-1" style="border: 0;">
                                <h4 class="card-header">Reports History</h4>
                                <br>
                                <div class="">
                                  <table>
                                    <thead class="table-primary" style="background-color: #CFE2FF;">
                                          <th width="7px" style="text-align: center;"></th>
                                          <th width="15px" style="text-align: center;">ID</th>
                                          <th width="20px" style="text-align: center;"></th>
                                          <th width="120px" style="text-align: center;">Created by</th>
                                          <th width="60px" style="text-align: center;"></th>
                                          <th width="10px">Date</th>
                                          <th width="55px" style="text-align: center;"></th>
                                          <th width="20px">Time</th>
                                          <th width="50px" style="text-align: center;"></th>
                                          <th width="130px">Type</th>
                                          <th width="20px" style="text-align: center;"></th>
                                          <th width="20px">Status</th>
                                          <th width="70px" style="text-align: center;"></th>
                                      </thead>
                                  </table>
                                  <div class="scrollsec2">
                                    <table class="table">
                                      
                                        @foreach($reports as $report)
                                        <tr>
                                          <td>{{$report->id}}</td>
                                          <td>{{$report->created_by}}</td>
                                          <td>{{$report->created_date}}</td>
                                          <td>{{$report->created_time}}</td>
                                          <td>{{$report->report_type}}</td>
                                          <td>{{$report->report_status}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </table>
                                  </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
          

        </div>
      </div>
              


    </body>
</html>