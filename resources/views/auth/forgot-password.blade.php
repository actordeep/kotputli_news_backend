<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kotputli News Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('../../backend/assets/vendors/mdi/css/') }}materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('../../backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('../../backend/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('../../backend/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth lock-full-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <div class="card-title text-left mb-3 form-group">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</div>
                <form method="POST" action="{{ route('password.email') }}">
                 @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" name="email"class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Email Password Reset Link</button>
                  </div>
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
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('../../backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('../../backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/misc.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/settings.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
  </body>
</html>