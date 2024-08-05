<?php
session_start(); // Starting the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/h_logo.png">
    <title>About Us</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <!--Fonts Work Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <!--Main Navigation-->
<header>
  <!-- Icon Container -->
  <div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="row gy-3">
        <!-- Left elements -->
        <div class="col-lg-2 col-sm-4 col-4">
          <a href="index.html" class="float-start">
            <img src="assets/H.png" height="35" />
          </a>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <div class="order-lg-last col-lg-5 col-sm-8 col-8">
          <div class="d-flex justify-content-end">
            <?php
              // Check if the user is logged in
                if(isset($_SESSION['user'])) {
                    // User is logged in
                    $loggedIn = true;
                    $username = $_SESSION['user'];
                } else {
                    // User is not logged in
                    $loggedIn = false;
                }


              if ($loggedIn) {
                // If logged in, display the "Account" option
                echo '

                      <div class="me-1 py-1 px-3 d-flex align-items-center">
                        <p class="d-none d-md-block mb-0 fw-bold">Welcome, ' . $username . '</p>
                      </div>
                      <a href="Account.php" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center">
                        <i class="fas fa-user-alt m-1 me-md-2"></i>
                        <p class="d-none d-md-block mb-0 ">Account</p>
                      </a>
                      <a href="shopping cart.php" class="border rounded py-1 px-3 nav-link d-flex align-items-center">
                        <i class="fas fa-shopping-cart m-1 me-md-2"></i>
                        <p class="d-none d-md-block mb-0">My cart</p>
                      </a>';
              } else {
                // If not logged in, display the "Sign In" option
                echo '<a href="SignIn.php" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center">
                        <i class="fas fa-user-alt m-1 me-md-2"></i>
                        <p class="d-none d-md-block mb-0 ">Sign in</p>
                      </a>
                      ';
              }?>
          </div>
        </div>
        <!-- Center elements -->

        <!-- Right elements -->
            <div class="col-lg-5 col-md-12 col-12">
              <div class="input-group justify-content-center">
                <input type="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" />
                <div class="input-group-append"> <!-- Addon wrapper -->
                  <button type="button" class="btn btn-success shadow-none">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
        <!-- Right elements -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg nav-bg">
  <!-- Container wrapper -->
  <div class="container justify-content-center justify-content-md-between">
    <div>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="product.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="about us.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="contact us.php">Contact Us</a>
          </li>
        </ul>
      <!-- Left links -->
    </div>
  </div>
  <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
  <!-- Jumbotron -->
  <div class="text-white py-5"
                                style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url('./assets/banner/banner-4.png'); 
                                min-height: 50px;
                                background-size: cover;
                                background-position: center;
                                width: 100%;
                                background-repeat: no-repeat;
                                top: 50%;
                                ">
     <div class="container py-5">
      <h1>    
        HealthPal <br/>
        Dental and Medical Supplies Trading
      </h1>
      <p>
        To provide high quality products that will benefit health and wellness of the people
      </p>
    </div>
  </div>
  <!-- Jumbotron -->
</header>
<!-- About Us -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="assets/category/about-us-1.jpg" alt="No Picture"/>
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3">Who Are We?</h2>
            <p class="lead fs-4 text-secondary mb-3">"We are a trustworthy provider of dental and medical supplies, operating with a small yet committed team of four individuals who values quality and dependability above all else."</p>
            <p class="mb-5">The HealthPal started at the year of pandemic as a distributor for Alcohol, Hand Soaps, Sanitizers and disinfectants.  But as the time went by, it grew and began to cater other medical products and also ventured into dental supplies.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About Us -->
<!-- About Us 2 -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Our Mission</h5>
            <p class="card-text">To make people enrich their lives through our products.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Our Vision</h5>
            <p class="card-text">To be a provider of high quality medical and dental supplies. </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Our Values</h5>
            <p class="card-text">To serve our community by promoting healthy living with our integrity and compassion.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--About Us 2 -->
<!-- About Us 3-->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3">About our products</h2>
            <p class="lead fs-4 text-secondary mb-3">"We strive to ensure a smooth and trustworthy transaction process, dedicated to delivering top-notch products to healthcare providers and patients"</p>
            <p class="mb-5"> Our carefully selected inventory aligns with the rigorous requirements of healthcare professionals, comprising essential supplies procured from reputable sources.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="assets/category/about-us-2.jpg" alt="No Picture"/>
      </div>
    </div>
  </div>
</section>
<!-- About Us 3-->
<!-- Footer -->
<footer class="bg-light text-muted">
  <div class="container pt-4">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <a href="index.php">
          <img src="assets/H.png" height="35" class="mb-3" alt="Logo">
        </a>
        <p class="text-dark" style="font-size: 14px; margin-left: 5px;"> MacArthur Highway, Sto.Domingo 1st Capas, Tarlac</p>
      </div>

      <div class="col-6 col-sm-4 col-lg-2">
        <h6 class="text-uppercase fw-bold mb-3">Store</h6>
        <ul class="list-unstyled mb-4">
          <li><a href="product.php" class="text-muted text-decoration-none text-muted-hover">Products</a></li>
          <li><a href="dentalproduct.php" class="text-muted text-decoration-none text-muted-hover">Dental Product</a></li>
          <li><a href="medicalproduct.php" class="text-muted text-decoration-none text-muted-hover">Medical Product</a></li>
        </ul>
      </div>

      <div class="col-6 col-sm-4 col-lg-2">
        <h6 class="text-uppercase fw-bold mb-3">Information</h6>
        <ul class="list-unstyled mb-4">
          <li><a href="about us.php" class="text-muted text-decoration-none text-muted-hover">About us</a></li>
          <li><a href="contact us.php" class="text-muted text-decoration-none text-muted-hover">Contact us</a></li>
        </ul>
      </div>

      <div class="col-6 col-sm-4 col-lg-2">
        <h6 class="text-uppercase fw-bold mb-3">Credits</h6>
        <ul class="list-unstyled mb-0">
          Images by <a href="https://www.freepik.com" class="text-muted text-decoration-none text-muted-hover">Freepik</a>
        </ul>
      </div>

      <div class="col-6 col-sm-4 col-lg-2">
        <h6 class="text-uppercase fw-bold mb-3">Visit Us On</h6>
        <ul class="list-unstyled mb-4">
          <a href="https://www.facebook.com/HealthPalEssentials" >
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg>
          </a>
        </ul>
      </div>
    </div>    
  </div>
  <!--- copyright --->
   <div class="">
    <div class="container">
      <div class="d-flex justify-content-between py-4 border-top">
        <p class="text-dark">© 2024 Healthpal Medical and Dental Supplies</p>
          <ul style="list-style-type: none; padding: 0; display: flex; margin-left: 20px;">
            <li style="margin-right: 10px;"><a href="product.php" class="text-muted text-decoration-none text-muted-hover">Terms</a> </li>
            <li style="margin-right: 10px;"><a href="product.php" class="text-muted text-decoration-none text-muted-hover">Privacy</a> </li>
            <li><a href="product.php" class="text-muted text-decoration-none text-muted-hover">Security</a></li>
          </ul>
      </div>
    </div>
  </div>
</footer>
<!-- Footer -->
<!--Jquery-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<!--Popper-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<!--Bootstrapjs-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>