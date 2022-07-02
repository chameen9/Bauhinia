<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bauhinia | Sign In</title>
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
                            <img src="{{URL::asset('/images/SigninFront.png')}}"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-0 col-lg-7  align-items-center">
                            <div class="card-body p-lg-4 text-black">
    
                            <form method="post" action="{{ url('/employee/checksignin') }}">
                            {{csrf_field()}}
                                <div class="align-items-center mb-1">
                                    <a href="{{ url('/') }}">
                                        <img src="{{URL::asset('/images/TextLogo.png')}}" alt="Logo" height="auto" width="235">
                                    </a>
                                </div>
                                <br>
                                <h5 class="fw-body mb-3 pb-3" style="letter-spacing: 1px;">Sign into the system</h5>
    
                                <div class="form-outline mb-4">
                                    <label class="body">Email</label>
                                    <input type="email" required name="email" class="form-control" placeholder="name@bauhinia.lk">
                                </div>
    
                                <div class="form-outline mb-3">
                                    <label class="body">Password</label>
                                    <input type="password" required name="password" class="form-control">
                                </div>
                                <br>
                                <div class="body">
                                    <div class="d-grid gap-2">
                                        <input type="submit" name="login" value="Sign in" class="btn btn-primary">
                                    </div>
                                </div>
                                <p class="body" style="color: #393f81;">Don't have an account? <a href="{{ url('/employee/signupconfirm') }}" class="link-primary">Sign up here</a></p>
                                @if(count($errors)>0 || $message = Session::get('error'))
                                    @if(count($errors)>0)
                                        <div class="alert alert-warning alert-dismissible fade show">
                                            <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                <a href="{{ url('/employee/signin') }}"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a></button>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                
                                    @if($message = Session::get('error'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            {{$message}}
                                            <a href="{{ url('/employee/signin') }}"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a></button>
                                        </div>
                                        <br>
                                        <br>
                                    @endif
                                @else
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                @endif
                                <p class="body text-muted">&copy; 2022 Bauhinia</p>
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