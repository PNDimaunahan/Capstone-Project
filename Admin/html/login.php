<?php
    session_start(); // Starting the session

    if(isset($_GET['exit']) && $_GET['exit'] === 'success') {
        $logoutMessage = "You have successfully logged out.";
    }
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Freedash Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
</head>
<?php
    if(isset($logoutMessage)) {
        echo '<div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content modal-filled bg-success">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <h4 class="mt-2 text-white">User Logout</h4>
                                <p class="mt-3 text-white">' . $logoutMessage . '</p>
                                <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Continue</button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->';
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var myModal = new bootstrap.Modal(document.getElementById("success-alert-modal"));
                    myModal.show();
                });
              </script>';
    }
?>
<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(../assets/images/background/Pattern.png) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-2 modal-bg-img" style="background-image: url(../assets/images/background/cover.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="../assets/images/h_logo.png" alt="wrapkit" class="img-fluid" style="max-width: 100px;">
                        </div>
                        <h2 class="mt-3 text-center">Login</h2>
                        <p class="text-center">Enter your username and password to access the panel.</p>
                        <form class="mt-4" id="login-form" method="post" action="./Include/login.inc.php">
                        <?php
                              function displayErrorMessage($error) {
                                  switch ($error) {
                                      case 'wrongpassword':
                                          return '<div class="alert">Invalid username or password. Please try again.</div>';
                                      case 'nouser':
                                          return '<div class="alert">User does not exist. Please register first.</div>';
                                      case 'emptyfields':
                                          return '<div class="alert">Please fill in all fields.</div>';
                                      case 'sqlerror':
                                          return '<div class="alert">A database error occurred. Please try again later.</div>';
                                      case 'toomanypasswordattempts':
                                          return '<div id="login-attempts-alert" class="alert">You have exceeded the maximum number of login attempts. Please try again later.</div>';
                                      default:
                                          return '';
                                  }
                              }
                              if (isset($_GET['error'])) {
                                  $error = $_GET['error'];
                                  echo displayErrorMessage($error);
                              }
                              ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark">Username</label>
                                        <input class="form-control" name="uname" type="text"
                                            placeholder="enter your username">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark">Password</label>
                                        <input class="form-control" name="pwd" type="password"
                                            placeholder="enter your password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" name="loginbtn">Sign In</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Copyright by HealthPal
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>