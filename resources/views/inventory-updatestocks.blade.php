<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Stocks</title>

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
                    <a href="{{url('/employee/home/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary disabled"><i class="bi bi-house"></i><br> Home</a>
                      <br>
                      <br>
                      <a href="{{url('/employee/orders/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary disabled"><i class="bi bi-shop"></i><br> Orders</a>
                      <br>
                      <br>
                      <a href="{{url('/employee/inventory/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary disabled"><i class="bi bi-card-checklist"></i><br> Inventory</a>
                      <br>
                      <br>
                      <a href="{{url('/employee/stocks/'.$name.'/'.$email.'')}}" class="btn btn-primary "><i class="bi bi-arrow-left"></i><br> Stocks</a>
                      <br>
                      <br>
                      <a href="#money" class="btn btn-outline-primary disabled"><i class="bi bi-coin"></i><br> Money</a>
                      <br>
                      <br>
                      @if($auth_level == 1)
                          <a href="{{url('/employee/tools/'.$name.'/'.$email.'')}}" class="btn btn-outline-primary"><i class="bi bi-gear"></i><br> Tools</a>
                      @else
                          <a href="" class="btn btn-outline-primary disabled"><i class="bi bi-gear"></i><br> Tools</a>
                      @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-11 col-md-11 col-sm-9">
                <div class="shadow bg-white rounded">
                    <div class="card p-1" style="border: 0;">
                        <form action="{{url('/employee/inventoryupdatestocks/update')}}" method="post">
                        {{csrf_field()}}
                        <br>
                          
                          
                          <div class="row">
                            <section id="inventory">
                              
                              <table class="table">
                                  <tr class="table-primary">
                                      <th>Product ID</th>
                                      <th>Product Name</th>
                                      <th>Brand</th>
                                      <th>Price</th>
                                      <th>Available Stock</th>
                                      <th>New Stock</th>
                                      <th>Add Stock</th>
                                  </tr>

                                      @foreach($stocks as $stock)
                                      <tr>
                                          <td>{{$stock->product_id}}</td>
                                          <td>{{$stock->product_name}}</td>
                                          <td>{{$stock->brand}}</td>
                                          <td>Rs. {{$stock->price}}</td>
                                          <td>{{$stock->stock}}</td>
                                          <td width="100px"><input type="number" value="1" name="new_stock" class="form-control" min="1" max="1000" step="1"></td>
                                          


                                          <td align="center">
                                            <input type="hidden" name="product_id" value="{{$product_id}}">
                                            <input type="hidden" name="old_stock" value="{{$stock->stock}}">
                                            <input type="hidden" name="email" value="{{$email}}">
                                            <input type="hidden" name="name" value="{{$name}}">
                                           <button type="submit" class="btn btn-primary">Save</button>
                                          </td>
                                            
                                      </tr>
                                      @endforeach
                                  
                                 
                              </table>
                             
                          </section>
                          </div>

                        </form>
                        
                    </div>
                </div>
            </div>

        </div>
      </div>

    </body>
</html>