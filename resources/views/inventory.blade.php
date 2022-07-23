<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Inventory</title>

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
                        <a href="{{url('/employee/orders/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-shop"></i><br> Orders</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/inventory/'.$name.'/'.$email.'')}}" class="btn btn-primary"><i class="bi bi-card-checklist"></i><br> Inventory</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/stocks/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-boxes"></i></i><br> Stocks</a>
                        <br>
                        <br>
                        <a href="{{url('/employee/money/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-coin"></i><br> Money</a>
                        <br>
                        <br>
                        @if($auth_level == 1)
                          <a href="{{url('/employee/tools/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-gear"></i><br> Tools</a>
                        @elseif($auth_level == 2)
                          <a href="{{url('/employee/tools/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-gear"></i><br> Tools</a>
                        @else
                          <a href="" class="btn btn-outline-primary disabled"><i class="bi bi-gear"></i><br> Tools</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-9">
                <div class="shadow bg-white rounded">
                    <div class="card p-1" style="border: 0;">
                        <form action="{{url('/employee/find/inventory')}}" method="post">
                        {{csrf_field()}}
                        <br>
                          <div class="row">

                            <div class="col-1">
                              <br>
                            </div>

                            <div class="col-4">
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">Category :</span><!--use category-->
                                  </div>
                                  
                                  <select name="category" class="form-control">
                                      <option value="All">All</option>
                                      <option value="T-Shirt Store">T-Shirt Store</option>
                                      <option value="New Arrivals">New Arrivals</option>
                                      <option value="High End Fashion Store">High End Fashion Store</option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-3">
                              <label><br></label>
                              <input type="hidden" name="name" value="{{$name}}">
                              <input type="hidden" name="email" value="{{$email}}">
                              <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-search"></i> Find</button>
                            </div>

                            <div class="col-1">
                              <br>
                            </div>

                            @if($resultcount > 0)
                              <div class="col-3">
                                @if($auth_level == 1)
                                  <a href="{{url('/employee/'.$name.'/'.$email.'/'.$stat.'/create/inventoryreport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
                                @elseif($auth_level == 2)
                                  <a href="{{url('/employee/'.$name.'/'.$email.'/'.$stat.'/create/inventoryreport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
                                @elseif($auth_level == 3)
                                  <a href="{{url('/employee/'.$name.'/'.$email.'/'.$stat.'/create/inventoryreport')}}" role="button" class="btn btn-info btn-block"><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
                                @else
                                  <a href="{{url('/employee/'.$name.'/'.$email.'/'.$stat.'/create/inventoryreport')}}" role="button" class="btn btn-info btn-block" disabled><i class="bi bi-file-earmark-arrow-down"></i> Downlaod Report</a>
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
                            <section id="inventory">
                              @if($stocks != null)
                              <p class="text-muted">
                                @if($stat == 'All')
                                  Showing {{$resultcount}} of {{$stat}} Results
                                @else
                                  Showing {{$resultcount}} Results in {{$stat}}
                                @endif
                              </p>
                              <table class="table">
                                  <tr class="table-primary">
                                      <th>Product ID</th>
                                      <th>Product Name</th>
                                      <th>Brand</th>
                                      <th>Category</th>
                                      <th>Price</th>
                                      <th>Update</th>
                                  </tr>

                                      @foreach($stocks as $stock)
                                      <tr>
                                          <td>{{$stock->product_id}}</td>
                                          <td>{{$stock->product_name}}</td>
                                          <td>{{$stock->brand}}</td>
                                          <td>{{$stock->category}}</td>
                                          <td align="right">Rs. {{$stock->price}}</td>
                                          


                                          <td align="center">
                                            @if($auth_level == 1)
                                              <a href="{{url('/employee/inventory/updateitem/'.$stock->product_id.'/'.$name.'/'.$email.'')}}" class="btn-outline-primary btn-sm" data-mdb-toggle="tooltip" title="Update {{$stock->product_id}}'s Details" ><i class="bi bi-arrow-repeat"></i></a>
                                              
                                            @elseif($auth_level == 2)
                                              <a href="{{url('/employee/inventory/updateitem/'.$stock->product_id.'/'.$name.'/'.$email.'')}}" class="btn-primary btn-sm" data-mdb-toggle="tooltip" title="Update This Product's Details" ><i class="bi bi-arrow-repeat"></i></i></a>
                                              
                                            @elseif($auth_level == 3)
                                              <a href="{{url('/employee/inventory/updateitem/'.$stock->product_id.'/'.$name.'/'.$email.'')}}" class="btn-primary btn-sm" data-mdb-toggle="tooltip" title="Update This Product's Details" ><i class="bi bi-arrow-repeat"></i></i></a>
                                              
                                            @else
                                              <a href="{{url('/employee/inventory/updateitem/'.$stock->product_id.'/'.$name.'/'.$email.'')}}" class="btn btn-primary btn-sm disabled" data-mdb-toggle="tooltip" title="You can't do this action" ><i class="bi bi-plus-circle"></i></a>
                                              
                                            @endif
                                          </td>
                                            
                                      </tr>
                                      @endforeach
                                  
                                 
                              </table>
                              @else
                                  <p align="center" class="text-muted">Find inventory using this window.</p>
                              @endif
                          </section>
                          </div>

                        </form>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-2">
              <div class="shadow bg-white rounded">
                  <div class="card p-1" style="border: 0;">
                    <div class="card-header">
                      <h6 class="card-title">Add a new product</h6>
                    </div>
                    <div class="card-body">
                      <form action="{{url('employee/inventory/addnewproduct')}}" method="post">
                      {{csrf_field()}}
                        <div class="row">
                          <div class="col-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text">Product Id</span>
                              <input type="text" name="product_id" required class="form-control" placeholder="XX000000" minlength="8">
                            </div>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-12">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" required class="form-control">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text">Brand</span>
                              <input type="text" name="brand" required class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text">Category</span>
                              <select name="category" class="form-control">
                                <option value="All" class="text-muted">All</option>
                                <option value="T-Shirt Store">T-Shirt Store</option>
                                <option value="New Arrivals">New Arrivals</option>
                                <option value="High End Fashion Store">High End Fashion Store</option>
                              </select>
                            </div>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text">Price</span>
                              <span class="input-group-text">Rs.</span>
                              <input type="text" name="price" required class="form-control" placeholder="0000.00">
                            </div>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text">Stock</span>
                              <input type="number" name="stock" required class="form-control" min="10" max="1000" step="1">
                            </div>
                          </div>
                        </div>
  
                        <div class="row">
                          <div class="col-12">
                            <input type="hidden" name="email" value="{{$email}}">
                            <input type="hidden" name="name" value="{{$name}}">
                            <div class="d-grid gap-2">
                              @if($auth_level == 1)
                                <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-file-earmark-plus"></i> Add Product</button>
                              @elseif($auth_level == 2)
                                <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-file-earmark-plus"></i> Add Product</button>
                              @elseif($auth_level == 3)
                                <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-file-earmark-plus"></i> Add Product</button>  
                              @else
                                <button type="submit" disabled class="btn btn-primary btn-block"><i class="bi bi-file-earmark-plus"></i> Add Product</button>
                              @endif
  
                            </div>
                          </div>
                        </div>

                        @if(count($errors)>0 || $message = Session::get('message'))
                        
                          <div class="row">
                            @if(count($errors)>0)
                              <div class="card-body">
                                <div class="alert alert-danger">
                                  <ul>
                                    @foreach($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                            @endif

                            @if($message = Session::get('message'))
                              <div class="card-body">
                                <div class="alert alert-success">
                                  {{$message}}
                                </div>
                              </div>
                            @endif
                          </div>
                        @endif

                      </form>

                    </div>
                      
                  </div>
              </div>
          </div>

        </div>
      </div>
              


    </body>
</html>