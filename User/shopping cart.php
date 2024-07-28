<?php
session_start(); // Starting the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Shopping Cart</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/h_logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/h_logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
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
      /* Custom CSS for navigation tabs */
      .nav-pills .nav-link.active, .nav-pills .nav-link.active:focus, .nav-pills .nav-link.active:hover {
          background-color: #28a745; /* Set background color for selected tab */
          color: white; /* Set text color for selected tab */
      }

      .nav-pills .nav-link:not(.active) {
          background-color: #30d5c8; /* Set background color for unselected tabs */
          color: white; /* Set text color for unselected tabs */
      }
      .header {
        text-align: center;
        font-weight: bold;
        margin-bottom: 10px;
      }
      .align-items-center .d-flex {
        display: flex;
        align-items: center;
      }
    </style>
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
          <a href="index.php" class="float-start">
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
<!-- Heading -->
<div style=" background-color: #f5f5f5;">
  <div class="container py-4 d-flex justify-content-between align-items-center">
    <h3 class="text-black mb-0 fw-heavy">My Cart</h3>
    <!-- Breadcrumb -->
    <nav>
      <h6 class="mb-0">
        <a href="index.php" class="text-black-50">Home</a>
        <span class="text-black-50 mx-2"> > </span>
        <a href="shoppingcart.php" class="text-black "><u>Shopping Cart</u></a>
      </h6>
    </nav>
    <!-- Breadcrumb -->
  </div>
</div>
</header>
<!-- Heading -->


<!--content-->
<section class="d-flex align-items-center justify-content-center" style="padding: 20px; background-color: #f5f5f5;">
  <div class="card" >
    <div class="card-body">
      <ul class="rounded nav nav-pills mb-3 d-flex" id="pills-tab" role="tablist" style="background-color: #f5f5f5;">
          <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link active w-100" id="pills-order-summary-tab" data-bs-toggle="pill" data-bs-target="#pills-order-summary" type="button" role="tab" aria-controls="pills-order-summary" aria-selected="true" style="pointer-events: none; border-radius: 0.50rem 0 0 0.50rem;">
                  <span class="d-none d-sm-inline"><i class="fas fa-list-alt"></i> <br>My Cart Summary</span>
                  <span class="d-inline d-sm-none"><i class="fas fa-list-alt"></i></span>
              </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="pills-payment-method-tab" data-bs-toggle="pill" data-bs-target="#pills-payment-method" type="button" role="tab" aria-controls="pills-payment-method" aria-selected="false" style="pointer-events: none; border-radius: 0;">
                  <span class="d-none d-sm-inline"><i class="fas fa-credit-card"></i><br> Payment Method</span>
                  <span class="d-inline d-sm-none"><i class="fas fa-credit-card"></i></span>
              </button>
          </li>
          <li class="nav-item flex-fill" role="presentation" style="pointer-events: none; border-radius: 0;">
              <button class="nav-link w-100" id="pills-shipping-method-tab" data-bs-toggle="pill" data-bs-target="#pills-shipping-method" type="button" role="tab" aria-controls="pills-shipping-method" aria-selected="false" style="border-radius: 0;">
                  <span class="d-none d-sm-inline"><i class="fas fa-shipping-fast"></i><br> Shipping Method</span>
                  <span class="d-inline d-sm-none"><i class="fas fa-shipping-fast"></i></span>
              </button>
          </li>
          <li class="nav-item flex-fill" role="presentation" style="pointer-events: none;">
              <button class="nav-link w-100" id="pills-checkout-tab" data-bs-toggle="pill" data-bs-target="#pills-checkout" type="button" role="tab" aria-controls="pills-checkout" aria-selected="false" style="border-radius: 0 0.50rem 0.50rem 0;">
                  <span class="d-none d-sm-inline"><i class="fas fa-shopping-cart"></i><br> Checkout Method</span>
                  <span class="d-inline d-sm-none"><i class="fas fa-shopping-cart"></i></span>
              </button>
          </li>
      </ul>
      <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" id="progress-bar" role="progressbar" style="width: 25%;" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-order-summary" role="tabpanel" aria-labelledby="pills-order-summary-tab">
        <section class="my-5">
          <div class="container">
            <div class="row">
              <!-- cart -->
                <div class="col-lg-9">
                  <div class="card border shadow-0">
                    <div class="m-4"> 

                      <div class="row gy-3 mb-2 text-center">
                        <div class="col-lg-5">
                          <div class="header">
                            <strong>Products</strong>
                          </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6">
                          <div class="header">
                            <strong>Quantity</strong>
                          </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6">
                          <div class="header">
                            <strong>Price</strong>
                          </div>
                        </div>
                        <div class="col-lg">
                          <div class="header">
                            <strong>Action</strong>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4" />
                      <div class="row gy-3 mb-4 align-items-center">
                        <div class="col-lg-5">
                          <div class="me-lg-5">
                            <div class="d-flex align-items-center">
                              <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/11.webp" class="border rounded me-3" style="width: 96px; height: 96px;" />
                              <div class="">
                                Winter jacket for men and lady
                                <p class="text-muted">Yellow, Jeans</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 d-flex justify-content-center">
                          <select style="width: 100px;" class="form-select">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 text-center">
                          <text class="h6">₱1156.00</text> <br />
                          <small class="text-muted">₱460.00 / per item</small>
                        </div>
                        <div class="col-lg text-center">
                          <a href="#" class="btn btn-light border text-danger icon-hover-danger">Remove</a>
                        </div>
                      </div>
                    </div>
                    <div class="border-top pt-4 mx-4 mb-4">
                      <p class="fw-bold"><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within Tarlac area</p>
                      <p class="text-muted">
                        Prices of delivery may vary on location outside of Tarlac, If you have any question don't hesitate to inquire as on the contact us page or visit us on facebook.
                      </p>
                    </div>
                  </div>
                </div>
              <!-- cart -->
              <!-- summary -->
              <div class="col-lg-3">
                <div class="card shadow-0 border">
                  <div class="card-body">
                    <p class="mb-2">Order Summary</p>
                    <hr />
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Sub Total:</p>
                      <p class="mb-2">₱329.00</p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">TAX:</p>
                      <p class="mb-2">₱14.00</p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Total price:</p>
                      <p class="mb-2 fw-bold">₱283.00</p>
                    </div>

                    <div class="mt-3">
                      <a href="#" data-target="pills-payment-method-tab" class="btn btn-success w-100 shadow-0 mb-2">Next Step</a>
                      <a href="product.php" class="btn btn-light w-100 border mt-2"> Continue Shopping </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- summary -->
            </div>
          </div>
        </section>
        </div>
        <div class="tab-pane fade" id="pills-payment-method" role="tabpanel" aria-labelledby="pills-payment-method-tab">
        <section class="my-5">
          <div class="container">
            <div class="row">
              <!-- cart -->
              <div class="col-lg-9">
                <div class="card border shadow-0">
                  <div class="m-4">
                    <h4 class="card-title mb-4 fw-bold">Payment Method</h4>
                    <hr class="my-4" />
                    <div class="row mb-3">
                      <div class="col-lg-4 mb-3">
                        <!-- Default checked radio -->
                        <div class="form-check h-100 border rounded-3">
                          <div class="p-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked />
                            <label class="form-check-label fw-bold" for="flexRadioDefault1">
                              Manual Payment <br />
                              <small class="text-muted fw-light">Pay when the courier arrive to you </small>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 mb-3">
                        <!-- Default radio -->
                        <div class="form-check h-100 border rounded-3">
                          <div class="p-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" disabled />
                            <label class="form-check-label fw-bold" for="flexRadioDefault3">
                              G-Cash <br />
                              <small class="text-muted fw-light">Pay Through G-Cash </small>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="border-top pt-4 mx-4 mb-4">
                    <p class="fw-bold"><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within Tarlac area</p>
                    <p class="text-muted">
                      Prices of delivery may vary on location outside of Tarlac, If you have any question don't hesitate to inquire as on the contact us page or visit us on facebook.
                    </p>
                  </div>
                </div>
              </div>
              <!-- cart -->
              <!-- summary -->
              <div class="col-lg-3">
                <div class="card shadow-0 border">
                  <div class="card-body">
                    <div class="me-lg-5">
                      <div class="d-flex">
                        <div class="">
                          Winter jacket for men and lady
                          <p class="text-muted">Yellow, Jeans</p>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Sub Total:</p>
                      <p class="mb-2">₱329.00</p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">TAX:</p>
                      <p class="mb-2">₱14.00</p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Total price:</p>
                      <p class="mb-2 fw-bold">₱283.00</p>
                    </div>

                    <div class="mt-3">
                      <a href="#" data-target="pills-shipping-method-tab" class="btn btn-success w-100 shadow-0 mb-2">Next Step</a>
                      <a href="#" data-target="pills-order-summary-tab" class="btn btn-light w-100 border mt-2"> Back to My Cart </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- summary -->
            </div>
          </div>
        </section>
        </div>
        <div class="tab-pane fade" id="pills-shipping-method" role="tabpanel" aria-labelledby="pills-shipping-method-tab">
        <section class="my-5">
          <div class="container">
            <div class="row">
              <!-- Shipping -->
              <div class="col-lg-9">
                <div class="card border shadow-0">
                  <div class="m-4">
                    <h5 class="card-title mb-3 fw-bold">Shipping info</h5>
                    <hr class="my-4" />
                        <div class="row mb-3">
                          <div class="col-lg-4 mb-3">
                            <!-- Default checked radio -->
                            <div class="form-check h-100 border rounded-3">
                              <div class="p-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked />
                                <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                  Delivery <br />
                                  <small class="text-muted fw-light">Deliver to you </small>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 mb-3">
                            <!-- Default radio -->
                            <div class="form-check h-100 border rounded-3">
                              <div class="p-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" />
                                <label class="form-check-label fw-bold" for="flexRadioDefault3">
                                  Self pick-up <br />
                                  <small class="text-muted fw-light">Come to our shop </small>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                  <!-- Checkout -->
                  </div>
                  <div class="border-top pt-4 mx-4 mb-4">
                    <p class="fw-bold"><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within Tarlac area</p>
                    <p class="text-muted">
                      Prices of delivery may vary on location outside of Tarlac, If you have any question don't hesitate to inquire as on the contact us page or visit us on facebook.
                    </p>
                  </div>
                </div>
              </div>
              <!-- Shipping -->
              <!-- summary -->
              <div class="col-lg-3">
                <div class="card shadow-0 border">
                  <div class="card-body">
                    <div class="me-lg-5">
                      <div class="d-flex">
                        <div class="">
                          Winter jacket for men and lady
                          <p class="text-muted">Yellow, Jeans</p>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Sub Total:</p>
                      <p class="mb-2">₱329.00</p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">TAX:</p>
                      <p class="mb-2">₱14.00</p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Total price:</p>
                      <p class="mb-2 fw-bold">₱283.00</p>
                    </div>

                    <div class="mt-3">
                      <a href="#" data-target="pills-checkout-tab" id="checkoutmethod" class="btn btn-success w-100 shadow-0 mb-2"> Next Step </a>
                      <a href="#" data-target="pills-payment-method-tab" class="btn btn-light w-100 border mt-2"> Back to Payment </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- summary -->
            </div>
          </div>
        </section>              
        </div>
        <div class="tab-pane fade" id="pills-checkout" role="tabpanel" aria-labelledby="pills-checkout-tab">
        <section class="my-5">
          <div class="container">
            <div class="row">
              <!-- cart -->
              <div class="col-lg-9">
                <div class="card border shadow-0">
                  <div class="m-4">
                    <h5 class="card-title mb-3 fw-bold">Checkout Summary</h5>
                    <hr class="my-4" />
                      <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-3">
                          <!-- Default checked radio -->
                          <div class="form-check h-100 border rounded-3">
                            <div class="p-3">
                              <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                Payment Selected<br />
                                <small class="text-muted fw-light">Manual Payment </small>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                          <!-- Default radio -->
                          <div class="form-check h-100 border rounded-3">
                            <div class="p-3">
                              <label class="form-check-label fw-bold" for="flexRadioDefault3">
                                Shipping Selected <br />
                                <small class="text-muted fw-light">Self Pick-up</small>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="form-check h-100 border rounded-3">
                            <div class="p-3">
                              <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                Address Selected<br />
                                <small class="text-muted fw-light">Example PSJdopaijsihjo </small>
                              </label>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="border-top pt-4 mx-4 mb-4">
                    <p class="fw-bold"><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                    <p class="text-muted">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                      aliquip
                    </p>
                  </div>
                </div>
              </div>
              <!-- cart -->
              <!-- summary -->
              <div class="col-lg-3">
                <div class="card shadow-0 border">
                  <div class="card-body">
                    <div class="me-lg-5">
                      <div class="d-flex">
                        <div class="">
                          Winter jacket for men and lady
                          <p class="text-muted">Yellow, Jeans</p>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Sub Total:</p>
                      <p class="mb-2">₱329.00</p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">TAX:</p>
                      <p class="mb-2">₱14.00</p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Total price:</p>
                      <p class="mb-2 fw-bold">₱283.00</p>
                    </div>

                    <div class="mt-3">
                      <a href="account.php" class="btn btn-success w-100 shadow-0 mb-2"> Checkout </a>
                      <a href="#" data-target="pills-shipping-method-tab" id="checkoutmethod" class="btn btn-light w-100 border mt-2"> Back to Shipping </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- summary -->
            </div>
          </div>
        </section>
        </div>
      </div>
    </div>
</section>
<!--content-->
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the anchor elements
    var anchors = document.querySelectorAll('[data-target]');

    // Add click event listener to each anchor
    anchors.forEach(function(anchor) {
        anchor.addEventListener('click', function(event) {
            // Prevent default anchor behavior
            event.preventDefault();

            // Get the target ID from data attribute
            var targetId = anchor.getAttribute('data-target');
            var targetButton = document.getElementById(targetId);
            if (targetButton) {
                targetButton.click();
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Get all button elements
    var buttons = document.querySelectorAll('[data-bs-toggle="pill"]');

    // Get the progress bar element
    var progressBar = document.getElementById('progress-bar');

    // Add click event listener to each button
    buttons.forEach(function(button, index) {
        button.addEventListener('click', function(event) {
            // Calculate progress percentage based on the button index
            var progressPercentage = (index + 1) * 25;

            // Update the progress bar width
            progressBar.style.width = progressPercentage + '%';
        });
    });
});
</script>
</body>
</html>
