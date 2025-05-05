<?php
session_start();
$errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="shortcut icon" href="src/img/icon.png" type="image/x-icon" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Left Section -->
        <div class="col-sm-6 text-black d-flex flex-column justify-content-center bg-light mh-100">
          <div class="px-5 ms-xl-4 d-flex justify-content-center">
            <img src="src/img/icon.png" class="w-25" alt="" />
          </div>

          <div class="d-flex align-items-center justify-content-center px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
            <form style="width: 23rem" action="src/php/auth.php" method="POST">
              <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                Log in
              </h3>

              <!-- Email Input -->
              <div class="form-outline mb-4">
                <input type="text" id="email" name="username" class="form-control form-control-lg"
                  placeholder="Enter your email" required />
                <label class="form-label" for="email">Email address</label>
              </div>

              <!-- Password Input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg"
                  placeholder="Enter your password" required />
                <label class="form-label" for="password">Password</label>
              </div>

              <!-- Login Button -->
              <div class="pt-1 mb-4">
                <button class="btn btn-info btn-lg btn-block" type="submit">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Right Section -->
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="src/img/ilustrasi2.png" alt="Login image" class="w-100 vh-100 img-fluid object-fit-cover" />
        </div>
      </div>
    </div>
  </section>

  <!-- SweetAlert for Error Message -->
  <?php if (!empty($errorMessage)): ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Login Gagal',
        text: '<?php echo $errorMessage; ?>',
        confirmButtonText: 'OK'
      });
    </script>
  <?php endif; ?>

  <!-- Scripts -->
  <script src="src/js/bundle.js"></script>
</body>

</html>