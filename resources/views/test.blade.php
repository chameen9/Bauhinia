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
    <body>
      <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">
        
                    <h3 class="mb-5">Sign in</h3>
        
                    <div class="form-outline mb-4">
                      <input type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                      <label class="form-label" for="typeEmailX-2">Email</label>
                    </div>
        
                    <div class="form-outline mb-4">
                      <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                      <label class="form-label" for="typePasswordX-2">Password</label>
                    </div>
        
                    <hr class="my-4">
  
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
        
                    
        
                    
        
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </section>
    </body>
  </html>