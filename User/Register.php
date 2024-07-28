<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Register</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/h_logo.png">
    <!-- Font Awesome -->
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

<!--Sign Up Body-->
<section class="vh-100" style="background-color: #D4F1F4;">
  <div class="container py-1 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row">
            <div class="col-md-6 d-flex align-items-center h-50">
              <div class="p-lg-5 text-black">
                <button type="button" class="btn mb-4 rounded-pill btn-primary" onclick="window.location.href='SignIn.php';">
                <i class="fas fa-chevron-left"></i> Back
                </button>
                <div class="d-flex align-items-center mb-3 pb-2">
                    <img src="assets/H_Logo.png" alt="login form" class="img-fluid" style="max-width: 100px;"/>
                </div>
                <h5 class="fw-normal pb-3" style="letter-spacing: 1px;">Sign Up to HealthPal E-commerce</h5>
                <p style="color: #393f81;">Continue shopping by signing up</p>
              </div>
            </div>
            <div class="col-md-6 mb-4 mt-5 my-3 pb-2 row d-flex justify-content-center align-items-center">
                <!--Sign Up Formy-->
                <form method="post" action="./include/register_inc.php" onsubmit="return validateForm()">
                    <?php 
                        if(isset($_SESSION['registration_success']) && $_SESSION['registration_success'] == true) {
                              echo "<h3 style='color:green;'>Registration successful!</h3><br>";

                              // Clear the session variable
                              unset($_SESSION['registration_success']);

                             echo "<script>
                                      setTimeout(function(){
                                        window.location.href = 'index.php';
                                    }, 1000);                                  
                                   </script>";
                          }
                    ?>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control form-control-lg" name="user_name" placeholder="Username" autocomplete="off"/>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" autocomplete="off"/>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" class="form-control form-control-lg" name="confirmpassword" id="confirmPassword" placeholder="Confirm Password" autocomplete="off"/>
                    </div>

                    <div id="error-message" style="color: red;"></div>

                    <div class="pt-1 mb-4 d-grid">
                        <button class="btn btn-lg btn-primary btn-block " name="btnreg" type="submit">Sign Up</button>
                    </div>

                    <p class="mb-2 pb-lg-2" style="color: #393f81;">By Agreeing to sign up your account, you accept the terms and services provided by HealthPal Medical and Dental Trading</p>
                </form>
                <!--Sign Up Formy-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Sign Up Body-->

<script>
function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    // Regular expression pattern to match passwords with at least 7 characters including one of the special characters '@', '_', or 'z'
    var passwordPattern = /^(?=.*[@_z]).{7,}$/;

    if (password !== confirmPassword) {
        // Display custom error message on the webpage
        document.getElementById("error-message").innerText = "The Password you inputed does not match!";
        // Prevent form submission
        return false;
    }

    // Check if password meets the required pattern
    if (!passwordPattern.test(password)) {
        // Display custom error message for password requirements
        document.getElementById("error-message").innerText = "Password must be at least 7 characters long and contain one of the special characters '@', '_', or 'z'";
        // Prevent form submission
        return false;
    }

    // Allow form submission if validation passes
    return true;
}
</script>

<!--Jquery-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<!--Popper-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<!--Bootstrapjs-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>