<?php
session_start();

require_once './include/db.handler.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the index page if not logged in
    header("Location: SignIn.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>My Account</title>
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
          color: black; /* Set text color for unselected tabs */
      }

      .text-muted-hover:hover {
          color: #719946 !important;
      }

      /* Define a container for the whole page */
      .container-wrapper {
          display: flex;
          flex-direction: column;
          min-height: 100vh; /* Ensure the container takes at least the full height of the viewport */
      }
      /* Content area */
      .content {
          flex: 1; /* Take remaining vertical space */
      }
      /* Footer styling */
      .footer {
          flex-shrink: 0; /* Don't allow the footer to grow */
      }
      .error-message {
          background-color: #f8d7da;
          color: #721c24;
          padding: 10px;
          margin-bottom: 10px;
          border: 1px solid #f5c6cb;
          border-radius: 5px;
      }
      .success-message {
          background-color: #f8d7da;
          color: #721c24;
          padding: 10px;
          margin-bottom: 10px;
          border: 1px solid #f5c6cb;
          border-radius: 5px;
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
        <!--Center Element-->
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
                      </div>';
              } else {
                //Put code redirection page (6.29.24) -paul 
              }?>
            </div>
        </div>
        <!--Center Element-->
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
  <!-- Icon Container -->
  <div style=" background-color: #f5f5f5;">
    <div class="container py-4 d-flex justify-content-between align-items-center">
      <h3 class="text-black mb-0 fw-heavy">Account</h3>
      <!-- Breadcrumb -->
      <nav>
        <h6 class="mb-0">
          <a href="index.php" class="text-black-50">Home</a>
          <span class="text-black-50 mx-2"> > </span>
          <a href="account.php" class="text-black "><u>Account</u></a>
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
</header>
<!-- Heading -->
<!--Section-->
<section class="d-flex" style="padding: 10px; background-color: #f5f5f5;">
  <!--List Nav-->
    <div class="container container-wrapper">
      <!--tab menu-->
      <div class="row justify-content-center">
        <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                  <ul class="rounded nav nav-pills mb-3 d-flex flex-column" id="pills-tab" role="tablist">
                      <li class="nav-item flex-fill" role="presentation">
                          <a class="nav-link active" id="pills-prof-summary" data-bs-toggle="pill" data-bs-target="#pills-profile-summary" href="#profile-summary" role="tab" aria-controls="profile-summary" aria-selected="true" style="border-radius: 0 0 0 0;">
                              <i class="fas fa-file-alt"></i> <span>Profile Summary</span>
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link flex-fill" id="pills-view-order" data-bs-toggle="pill" data-bs-target="#pills-view-orders" href="#myorder" role="tab" aria-controls="address" aria-selected="false" style="border-radius: 0 0 0 0;">
                              <i class="fas fa-box"></i> <span>View Orders</span>
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link flex-fill" id="wishlist" data-bs-toggle="pill" data-bs-target="#pills-wishlist-1" href="#wishlists" role="tab" aria-controls="account-details" aria-selected="false" style="border-radius: 0 0 0 0;">
                              <i class="fas fa-heart"></i> <span>Wishlist</span>
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link flex-fill" id="logout" data-bs-toggle="pill" data-bs-target="#pills-logout" href="#logout" role="tab" aria-controls="logout" aria-selected="false" style="border-radius: 0 0 0 0;">
                              <i class="fas fa-door-open"></i> <span>Logout</span>
                          </a>
                      </li>
                  </ul>
              </div>
            </div>
          </div>
    <!--tab menu-->
    <!--tabcontent-->
        <div class="col-lg-9 tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile-summary" role="tabpanel" aria-labelledby="pills-prof-summary">
                <div class="">
                    <div class="card border shadow-0">
                      <div class="m-4">
                        <h4 class="card-title mb-4 fw-bold">Profile Summary</h4>
                        <hr class="my-4" />
                        <?php
                        $readOnly = isset($_POST['editMode']) && $_POST['editMode'] === 'true' ? '' : 'readonly';
                          // Fetch user data from tbl_user
                          if(isset($_SESSION['user_id'])) {
                              $user_id_fk = $_SESSION['user_id'];
                              $query_user = "SELECT user_name FROM tbl_user WHERE user_id = ?";
                              $stmt_user = $pdo->prepare($query_user);
                              $stmt_user->execute([$user_id_fk]);
                              $user_row = $stmt_user->fetch(PDO::FETCH_ASSOC);
                              $username = $user_row['user_name'];
                          } else {
                              $username = '';
                          }

                          // Fetch user data from tbl_customer
                         if(isset($_SESSION['user_id'])) {
                              $user_id_fk = $_SESSION['user_id'];
                              $query_customer = "SELECT * FROM tbl_customer WHERE user_id_fk = ?";
                              $stmt_customer = $pdo->prepare($query_customer);
                              $stmt_customer->execute([$user_id_fk]);
                              
                              // Fetch the first row (if any)
                              $userData = $stmt_customer->fetch(PDO::FETCH_ASSOC);
                              
                              // Check if $userData is false (no rows returned)
                              if (!$userData) {
                                  // Handle the case where no rows were found
                                  $userData = array(
                                      'first_name' => '',
                                      'last_name' => '',
                                      'email' => '',
                                      'address' => ''
                                  );
                              }
                          } else {
                              // Handle the case where $_SESSION['user_id'] is not set
                              $userData = array(
                                  'first_name' => '',
                                  'last_name' => '',
                                  'email' => '',
                                  'address' => ''
                              );
                          }

                          // If form is submitted

                          if (isset($_SESSION['success'])) {
                              echo '<div class="success-message">' . $_SESSION['success'] . '</div>';
                              // Clear the success message from session to avoid displaying it multiple times
                              unset($_SESSION['success']);
                          }
                          // Check if there's an error message
                          if (isset($_SESSION['error'])) {
                              echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
                              // Clear the error message from session to avoid displaying it multiple times
                              unset($_SESSION['error']);
                          }

                          ?>
                          <form id="profileForm" method="POST" action="./include/update.profile.php">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username</label>
                                    <input class="form-control" id="inputUsername" name="inputUsername"type="text" placeholder="Username" value="<?php echo $username; ?>" readonly>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">First name</label>
                                        <input class="form-control" id="inputFirstName" name="first_name" type="text" placeholder="First name" value="<?php echo $userData['first_name']; ?>" <?php echo $readOnly; ?>>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Last name</label>
                                        <input class="form-control" id="inputLastName" name="last_name" type="text" placeholder="Last name" value="<?php echo $userData['last_name']; ?>" <?php echo $readOnly; ?>>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Email address" value="<?php echo $userData['email']; ?>" <?php echo $readOnly; ?>>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAddress">Address</label>
                                    <input class="form-control" id="inputAddress" name="address" type="text" placeholder="Address" value="<?php echo $userData['address']; ?>" <?php echo $readOnly; ?>>
                                </div>
                                <button id="editButton" class="btn btn-warning" type="button" onclick="toggleForm()">Edit</button>
                                <button class="btn btn-primary" id="saveButton" type="submit" style="display: none;">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--section-->
            <div class="tab-pane fade" id="pills-view-orders" role="tabpanel" aria-labelledby="pills-view-order">
                <div class="">
                    <div class="card border shadow-0">
                      <div class="m-4">
                        <h4 class="card-title mb-4 fw-bold">Wishlist</h4>
                        <hr class="my-4" />
                        <div class="row gy-3">
                            <div class="col-lg-5">
                              <div class="me-lg-5">
                                <div class="d-flex">
                                  <img src="assets/products/product-test.jpg" class="border rounded me-3" style="width: 96px; height: 96px;" />
                                  <div class="">
                                    Order 12
                                    <p class="text-muted">Product 1, Product 2 ...</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                              <div class="">
                                <text class="h6">Total Ammount</text> <br />
                                <small class="text-muted text-nowrap"> ₱460.00 </small>
                              </div>
                            </div>
                            <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                              <div class="float-md-end">
                                <a href="#" class="btn btn-light border text-danger icon-hover-danger"> See Details</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            <!--section-->
            <div class="tab-pane fade" id="pills-wishlist-1" role="tabpanel" aria-labelledby="wishlist">
                <div class="">
                    <div class="card border shadow-0">
                      <div class="m-4">
                        <h4 class="card-title mb-4 fw-bold">Wishlist</h4>
                        <hr class="my-4" />
                        <div class="row gy-3">
                            <div class="col-lg-5">
                              <div class="me-lg-5">
                                <div class="d-flex">
                                  <img src="assets/products/product-test.jpg" class="border rounded me-3" style="width: 96px; height: 96px;" />
                                  <div class="">
                                    Sure-Guard Disposable Syringe 3cc
                                    <p class="text-muted">Pc, Box</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                              <div class="">
                                <text class="h6">₱1156.00</text> <br />
                                <small class="text-muted text-nowrap"> ₱460.00 / per box </small>
                              </div>
                            </div>
                            <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                              <div class="float-md-end">
                                <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!--section-->
            <div class="tab-pane fade" id="pills-logout" role="tabpanel" aria-labelledby="logout">
              <div class="container">
                  <div class="card border shadow-0">
                      <div class="m-4">
                          <h4 class="card-title mb-4 fw-bold">Logout</h4>
                          <hr class="my-4" />
                          <p>Are you sure you want to logout?</p>
                          <div class="d-flex justify-content-center">
                              <button onclick="window.location.href='include/logout.inc.php'" class="btn btn-danger me-2" type="button">Yes</button>
                              <button onclick="window.location.href='account.php'" class="btn btn-warning ms-2" type="button">No</button>
                          </div>
                      </div>
                  </div>
              </div>  
            </div>
          <!--tab content-->
          </div>
        <!--section-->           
        </div>
      </div>        
    <!--container-->
    </div>
  </div>
<!--List Nav-->
</section>
<!--Section-->
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
<!-- Footer -->
  <!--Jquery-->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <!--Popper-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <!--Bootstrapjs-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var tabTriggers = document.querySelectorAll('.nav-link');
    
    tabTriggers.forEach(function(trigger) {
        trigger.addEventListener('click', function() {
            var tabPaneId = trigger.getAttribute('data-bs-target');
            var tabPane = document.querySelector(tabPaneId);
            
            // Activate tab pane
            var tabInstance = new bootstrap.Tab(tabPane);
            tabInstance.show();
        });
    });
});
function toggleForm() {
    var form = document.getElementById('profileForm');
    var editButton = document.getElementById('editButton');
    var saveButton = document.getElementById('saveButton');
    var formFields = form.querySelectorAll('input');

    if (editButton.innerHTML === 'Edit') {
        // Enable form fields for editing
        formFields.forEach(function(field) {
            if (field.name !== 'inputUsername') {
            field.removeAttribute('readonly');
            field.disabled = false;
        }
        });
        
        editButton.innerHTML = 'Cancel';
        saveButton.style.display = 'inline-block';
    } else {
        // Disable form fields and make them read-only
        formFields.forEach(function(field) {
            field.setAttribute('readonly', true);
            field.disabled = true;
        });

        editButton.innerHTML = 'Edit';
        saveButton.style.display = 'none';
    }
}
</script>
</body>
</html>