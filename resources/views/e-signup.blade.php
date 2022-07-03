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
    
                            <form method="post" action="{{ url('/employee/signupasemployee') }}">
                            {{csrf_field()}}
                                    @if(count($errors)>0)
                                        <a href="{{ url('/') }}">
                                            <img src="{{URL::asset('/images/TextLogo.png')}}" alt="Logo" height="auto" width="235">
                                        </a>
                                        <br>
                                        <h5 class="fw-body  " style="letter-spacing: 1px;">Follow these instructions & try again !</h5>
                                        <br>
                                        <div class="alert alert-warning alert-dismissible fade show">
                                            <ol>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ol>
                                        </div>
                                        <a href="{{ url('/employee/signupconfirm') }}" class="link-primary">Try Again</a>

                                    @elseif($message = Session::get('message'))
                                        <a href="{{ url('/') }}">
                                            <img src="{{URL::asset('/images/TextLogo.png')}}" alt="Logo" height="auto" width="235">
                                        </a>
                                        <br>
                                        <h5 class="fw-body  " style="letter-spacing: 1px;">Congratulations !</h5>
                                        <br>
                                        <div class="body">
                                            Congratulations {{$message}}.
                                            <br>
                                            Sign into your account <a href="{{ url('/employee/signin') }}" class="link-primary">in here.</a>
                                        </div>
                                    @else
                                    <h5 class="fw-body" style="letter-spacing: 1px;">Employee sign up form</h5>
    
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-2">
                                                <label class="body">Email</label>
                                                <input type="text" name="email" value="{{$email}}" required readonly class="form-control" placeholder="name@example.com" data-mdb-showcounter="true" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mt-2">
                                                <label class="body">Your Id</label>
                                                <input type="text" name="id" value="{{$id}}" required readonly class="form-control" placeholder="Ex: Jhone Smith" data-mdb-showcounter="true" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Name</label>
                                                <input type="text" required name="name" class="form-control" data-mdb-showcounter="true" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Create Password</label>
                                                <input type="password" required name="password" class="form-control" data-mdb-showcounter="true" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Address</label>
                                                <textarea class="form-control" required name="address" id="address" rows="2" data-mdb-showcounter="true" maxlength="250" placeholder="Street, City, District"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Contact Number</label>
                                                <input type="tel" name="contact_number" required class="form-control" data-mdb-showcounter="true" maxlength="15">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Date of Birth</label>
                                                <input type="date" name="date_of_birth" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Designation</label>
                                                <input type="tel" name="role" required class="form-control" data-mdb-showcounter="true" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mt-3">
                                                <label class="body">Gender</label>
                                                <select class="form-control" name="gender" required>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
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