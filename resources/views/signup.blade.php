<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bauhinia | Sign Up</title>
        <meta name="viewpoint" content="widht=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <link rel = "icon" href = "{{URL::asset('/images/Xicon.ico')}}" type = "image/x-icon">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Quicksand:wght@300&display=swap" rel="stylesheet">

        <link href="/css/main.css" rel="stylesheet">


    </head>
    <body class="antialiased">
        <div class="body">
            <section class="vh-100" style="background-color: #ffffff;">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem; border-color:#0B5ED7">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{URL::asset('/images/SignupFront.png')}}"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-0 col-lg-7  align-items-center">
                            <div class="card-body p-lg-4 text-black">
    
                            <form method="post" action="{{ url('/customer/signupascustomer') }}">
                            {{csrf_field()}}
                                <div class="align-items-center mb-1 ">
                                <a href="{{ url('/') }}">
                                    <img src="{{URL::asset('/images/TextLogo.png')}}" alt="Logo" height="auto" width="235">
                                </a>
                                <br>
                                    
                                </div>
                                    @if(count($errors)>0)
                                        <h5 class="fw-body  " style="letter-spacing: 1px;">Follow these instructions & try again !</h5>
                                        <br>
                                        <div class="alert alert-warning alert-dismissible fade show">
                                            <ol>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ol>
                                        </div>
                                        <a href="{{ url('/customer/signup') }}" class="link-primary">Try Again</a>
                                    @else
                                    <h5 class="fw-body" style="letter-spacing: 1px;">Sign up as a customer</h5>
    
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-2">
                                                <label class="body">Email</label>
                                                <input type="email" name="email" required class="form-control" placeholder="name@example.com" data-mdb-showcounter="true" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mt-2">
                                                <label class="body">Name</label>
                                                <input type="text" name="name" required class="form-control" placeholder="Ex: Jhone Smith" data-mdb-showcounter="true" maxlength="100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Password</label>
                                                <input type="password" required name="password" class="form-control" data-mdb-showcounter="true" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Confirm Password</label>
                                                <input type="password" required name="confirm_password" class="form-control" data-mdb-showcounter="true" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Delivery Address</label>
                                                <textarea class="form-control" required name="delivery_address" id="delivery_address" rows="2" data-mdb-showcounter="true" maxlength="250" placeholder="Street, City, District"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Primary Contact Number</label>
                                                <input type="tel" name="primary_contact_number" required class="form-control" data-mdb-showcounter="true" maxlength="15">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Secondary Contact Number</label>
                                                <input type="tel" name="secondary_contact_number" required class="form-control" data-mdb-showcounter="true" maxlength="15">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                        @if($message = Session::get('message'))
                                            <div class="alert alert-success alert-dismissible fade show">
                                                {{$message}} Sign into your account <a href="{{ url('/customer/signin') }}" class="link-success">in here.</a>
                                                <a href="{{ url('/customer/signup') }}"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a></button>
                                            </div>
                                        @else
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline mt-3">
                                                    <div class="d-grid">
                                                        <button type="reset" class="btn btn-outline-primary">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline mt-3">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="body" style="color: #393f81;">Already have an account? <a href="{{ url('/customer/signin') }}" class="link-primary">Sign in here</a></p>
                                            
                                        <p class="body text-muted">&copy; 2022 Bauhinia</p>
                                        @endif
                                    @endif
                            </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>