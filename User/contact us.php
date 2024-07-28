<?php
session_start(); // Starting the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Contact Us</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/h_logo.png">
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
                                style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url('./assets/banner/banner-5.png'); 
                                min-height: 50px;
                                background-size: cover;
                                background-position: center;
                                width: 100%;
                                background-repeat: no-repeat;
                                top: 50%;
                                ">
     <div class="container py-5">
      <h1>
        HealthPal <br />
        Dental and Medical Supplies Trading
      </h1>
      <p>
        Have problems, suggestions, or anything to inquire?
      </p>
    </div>
  </div>
  <!-- Jumbotron -->
</header>
<!--header-->
<!-- Feature -->
<section style="background-color: #f5f5f5;">
  <div class="container text-dark pt-3">
    <header class="pt-4 pb-3">
      <h3 class="text-center" >Contact Page</h3>
    </header>

    <div class="row mb-4">
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-question fa-2x fa-fw text-warning floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Got Questions or Problems?</h6>
            <p>You can just fill up the form or just dial the phone number below to be assisted as soon as possible.</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-exclamation-circle fa-2x fa-fw text-warning floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Inquiry?</h6>
            <p >You can inquire certain products that you are not familiar to or interested. You can chat, email, phone us for your inquiries.</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-headset fa-2x fa-fw text-warning floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Customer Support</h6>
            <p>Since HealthPal is still a growing company, customer support is available through email or phone given below.</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
    </div>
  </div>
  <!-- container end.// -->
</section>
<!-- Feature -->
<!--contact us-->
<section id="contact" class="py-5">
  <div class="row justify-content-center">
    <div class="col-xl-10">
      <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
        <div class="card-body p-0">
          <div class="row g-0">
            <div class="col-sm-6 d-none d-sm-block bg-image position-relative ">
              <div class="overlay-text text-white p-5">
                <h2 class="mb-4">Our Location</h2>
                <ul class="col-md-12" style="padding: 5px;">
                  <li class="mb-3">
                    <span class="icon-circle"><i class="fas fa-map-marker-alt"></span></i> <b>Address:</b> MacArthur Hwy, Sto. Domingo 1, Capas, 2315 Tarlac, Philippines
                  </li>
                  <li class="mb-3">
                    <span class="icon-circle"><i class="fas fa-phone-alt"></i></span> <b>Phone:</b> 09254455979
                  </li>
                  <li class="mb-3">
                    <span class="icon-circle"><i class="fab fa-facebook-f"></i></span> <b>Facebook:</b> <a href="https://www.facebook.com/HealthPalEssentials/" style="color: white;">Click Here</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 p-4">
              <div class="text-center">
                <div class="h3 fw-heavy">Contact Form</div>
                <p class="mb-4 fw-light text-muted">Have questions or want to get in touch? Fill out the form below, and we'll get back to you as soon as possible.</p>
              </div>
              <form id="contactForm">

                <!-- Name Input -->
                <div class="form-floating mb-3">
                  <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                  <label for="name">Name</label>
                  <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                </div>

                <!-- Email Input -->
                <div class="form-floating mb-3">
                  <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                  <label for="emailAddress">Email Address</label>
                  <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                  <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                </div>

                <!-- Message Input -->
                <div class="form-floating mb-3">
                  <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea>
                  <label for="message">Message</label>
                  <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                </div>

                <!-- Submit success message -->
                <div class="d-none" id="submitSuccessMessage">
                  <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                  </div>
                </div>

                <!-- Submit error message -->
                <div class="d-none" id="submitErrorMessage">
                  <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>

                <!-- Submit button -->
                <div class="d-grid">
                  <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
                </div>
              </form>
              <!-- End of contact form -->
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!--contact us-->
<!-- Footer -->
<footer class="bg-light text-muted">
  <div class="container pt-4">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <a href="index.php">
          <img src="assets/H.png" height="35" class="mb-3" alt="Logo">
        </a>
        <p class="text-dark">© 2024 Healthpal Medical and Dental Supplies</p>
      </div>

      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h6 class="text-uppercase fw-bold mb-3">Store</h6>
        <ul class="list-unstyled mb-0">
          <li><a href="product.php" class="text-muted">Products</a></li>
          <li><a href="dentalproduct.php" class="text-muted">Dental Product</a></li>
          <li><a href="medicalproduct.php" class="text-muted">Medical Product</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h6 class="text-uppercase fw-bold mb-3">Information</h6>
        <ul class="list-unstyled mb-0">
          <li><a href="about us.php" class="text-muted">About us</a></li>
          <li><a href="contact us.php" class="text-muted">Contact us</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h6 class="text-uppercase fw-bold mb-3">Credits</h6>
        <ul class="list-unstyled mb-0">
          Images by <a href="https://www.freepik.com/free-photo/top-view-pills-stethoscope-arrangement_24482233.htm#query=medical%20supplies&position=14&from_view=keyword&track=ais&uuid=326f6173-2538-4dbe-9396-0303fe20d3ae" class="text-muted">Freepik</a>
        </ul>
    </div>

      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h6 class="text-uppercase fw-bold mb-3">Visit Us On</h6>
        <ul class="list-unstyled mb-0">
          <a href="https://www.facebook.com/HealthPalEssentials" >
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg>
          </a>
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