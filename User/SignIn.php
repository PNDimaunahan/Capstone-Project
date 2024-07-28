<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login</title>
    <!-- Font Awesome -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/h_logo.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Fonts Work Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
      body{
        font-family: 'Poppins', sans-serif;
      }
    </style>
</head>
<body>
<!--Sign in Body-->
<section class="vh-100" style="background-color: #D4F1F4;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <!--buttons-->
            <div class="col-md-6 d-flex align-items-center h-50">
              <div class="card-body p-lg-5 text-black">
                <button type="button" class="btn mb-4 rounded-pill btn-primary" onclick="window.location.href='index.php';">
                <i class="fas fa-chevron-left"></i> Home
                </button>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="assets/H_Logo.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; max-width: 100px;"/>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
              </div>
            </div>
            <!--buttons-->
            <div class="col-md-6 mb-4 mt-5 my-3 pb-2 row d-flex justify-content-center align-items-center">
              <!--Forms input-->
              <form id="login-form" method="post" action="./Include/login.inc.php">
                  <?php
                  function displayErrorMessage($error) {
                      switch ($error) {
                          case 'wrongpassword':
                              return '<div class="alert">Invalid username or password. Please try again.</div><br>';
                          case 'nouser':
                              return '<div class="alert">User does not exist. Please register first.</div><br>';
                          case 'emptyfields':
                              return '<div class="alert">Please fill in all fields.</div>';
                          case 'sqlerror':
                              return '<div class="alert">A database error occurred. Please try again later.</div><br>';
                          case 'toomanypasswordattempts':
                              return '<div id="login-attempts-alert" class="alert">You have exceeded the maximum number of login attempts. Please try again later.</div><br>';
                          default:
                              return '';
                      }
                  }

                  if (isset($_GET['error'])) {
                      $error = $_GET['error'];
                      echo displayErrorMessage($error);
                  }
                  ?>
                  <div class="form-outline mb-4">
                      <input type="text" class="form-control form-control-lg" name="user" placeholder="Username"/>
                  </div>

                  <div class="form-outline mb-4">
                      <input type="password" class="form-control form-control-lg" name="pass" placeholder="Password"/>
                      <a class="small text-muted" href="#!">Forgot password?</a>
                  </div>
                  <!--buttons-->
                  <div class="pt-1 mb-4 d-grid gap-2">
                      <button id="login-btn" class="btn btn-lg btn-primary btn-block" type="submit" name="loginbtn">Login</button>
                  </div>
                  <!--buttons-->
                  <p class="mb-2 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="Register.php" style="color: #393f81;">Register here</a></p>
              </form>
              <!--Forms input-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Sign in Body-->

<!--Jquery-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<!--Popper-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<!--Bootstrapjs-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>