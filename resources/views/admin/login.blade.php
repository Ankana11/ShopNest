<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
   
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
      
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          
            <div class="card col-lg-4 mx-auto">
              @include('admin.message')
              <div class="card-body px-5 py-5">
              
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="{{ route('admin.authenticate') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror p_input">
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror p_input">
                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                  </div>
                  <div class="text-center">
                    <button class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>