<?php
session_start(); // Starting the session

if(isset($_GET['exit']) && $_GET['exit'] === 'success') {
    $logoutMessage = "You have successfully logged out.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Home Page</title>
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
<!--Main Navigation-->
<header>
  <!-- Icon Container -->
  <div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="row gy-3">
        <!-- Left elements -->
        <div class="col-lg-2 col-sm-4 col-4">
          <a href="#" target="_blank" class="float-start">
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
                                style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url('./assets/banner/banner-1.png'); 
                                min-height: 50px;
                                background-size: cover;
                                background-position: bottom;
                                width: 100%;
                                background-repeat: no-repeat;
                                top: 50%;
                                ">
    <div class="carousel">
      <div class="carousel-item">
        <div class="container py-5">
          <h1>
            Best quality <br />
            Products in our store
          </h1>
          <p>
            Medical Supplies, Dental Supplies and so on...
          </p>
          <a class="btn btn-outline-light" href="product.php">Shop Now</a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container py-5">
          <h1>
            Hundreds of products<br />
            To chose from
          </h1>
          <p>
            Gloves, Syringes, Microscope Slides and many more
          </p>
          <a class="btn btn-outline-light" href="product.php">Shop Now</a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container py-5">
          <h1>
            Browse <br />
            Our products now
          </h1>
          <p>
            Shop now, and find your medical and dental products!
          </p>
          <a class="btn btn-outline-light" href="product.php">Show Now</a>
        </div>
      </div>
      <div class="indicators"></div>
    </div>
  </div>
  <!-- Jumbotron -->
</header>
<!-- Products -->
<section>
  <div class="container my-5">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <header class="mb-4">
          <h3> New Products</h3>
        </header>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <header class="mb-4 text-end">
          <a href="product.php" class="see-more btn btn-sm rounded-pill px-3 py-2" style="background-color: #7b7a72;">See more</a>
        </header>
      </div>
      <?php
        require 'Include/db.handler.inc.php';
        $basePath = '../Admin/html/Include/';
        // Fetch product data from the database (assuming $pdo is your PDO object)
        $sql = "SELECT ProductID, product_image, Name, Price FROM tbl_product ORDER BY ProductID DESC LIMIT 8";
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class="row">
        <?php foreach ($products as $product): ?> 
          <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
            <div class="card w-100 my-2 shadow-2-strong">
              <a href="product_detail.php?id=<?php echo $product['ProductID']; ?>">
                <img src="<?php echo $basePath . $product['product_image']; ?>" alt="Product Image" class="card-img-top" style="aspect-ratio: 1 / 1" />
              </a>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $product['Name']; ?></h5>
                <div class="text-warning mb-1 me-2">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                  <span class="ms-1">
                    4.5
                  </span>
                  <span class="ms-1">
                    (201)
                  </span>
                </div>
                <!-- Rating stars can be added here if available -->
                <p class="card-text">₱ <?php echo $product['Price']; ?></p>
                <p class="card-text">42 Sold</p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<!-- Products -->

<!-- Feature -->
<section class="mt-5" style="background-color: #f5f5f5;">
  <div class="container text-dark pt-3">
    
    <header class="pt-4 pb-3">
      <h3>Reasons to buy at HealthPal</h3>
    </header>

    <div class="row mb-4">
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-camera-retro fa-2x fa-fw text-warning floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Reasonable prices</h6>
            <p>Based on the customers of HealthPal, the company is very competitive at giving reasonable prices against their competitors.</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-star fa-2x fa-fw text-warning floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Best quality</h6>
            <p>HealthPal is a growing trading shop, that emphasizes on the quality of goods. The company stores its products in a safe space.</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-box fa-2x fa-fw text-warning floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Hundred items</h6>
            <p>The company has various needs of the people, varying from medicines, small equipments, and dental products.</p>
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

<!-- Blog -->
<section class="mt-5 mb-4">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="card-banner bg-gray h-100" style="
                                                      min-height: 200px;
                                                      background-size: cover;
                                                      background-position: top-center;
                                                      width: 100%;
                                                      background-repeat: no-repeat;
                                                      top: 50%;
                                                      background-image: url('assets/company-pic-1.png');
                                                      ">
          <div class="p-3 p-lg-5 h-100" style="max-width: 100%; background-color: rgba(0, 0, 0, 0.3);">
            <h3 class="text-white">More About Us</h3>
            <p class="text-white">Learn what the company stands for...</p>
            <a class="btn btn-warning shadow-0 text-white" href="about us.php"> Learn More </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row mb-3 mb-sm-4 g-3 g-sm-4">
          <div class="col-6 d-flex">
            <div class="card w-100 rounded" style="
                                                    min-height: 200px; 
                                                    background-image: url('assets/banner/banner-3.jpg'); 
                                                    background-size: cover;">
              <div class="card-body" style="background-color: rgba(0, 0, 0, 0.7);">
                <h5 class="text-white">Medical Products</h5>
                <p class="text-white-50">Products for your medical needs</p>
                <a class="btn btn-outline-light btn-sm" href="medicalproduct.php">Learn more</a>
              </div>
            </div>
          </div>
          <div class="col-6 d-flex">
            <div class="card w-100 rounded" style="
                                                    min-height: 200px; 
                                                    background-image: url('assets/banner/banner-2.jpg'); 
                                                    background-size: cover;">
              <div class="card-body" style="background-color: rgba(0, 0, 0, 0.7);">
                <h5 class="text-white">Dental Products</h5>
                <p class="text-white-50">All you need for dental needs</p>
                <a class="btn btn-outline-light btn-sm" href="dentalproduct.php">Learn more</a>
              </div>
            </div>
          </div>
        </div>
        <!-- row.// -->
        <div class="card bg-success" style="min-height: 200px;">
          <div class="card-body">
            <h5 class="text-white">Having Problems?</h5>
            <p class="text-white-50" style="max-width: 400px;">Go to this page to know more about the page</p>
            <a class="btn btn-outline-light btn-sm" href="contact us.php">Learn more</a>
          </div>
        </div>
      </div>
      <!-- col.// -->
    </div>
    <!-- row.// -->
  </div>
  <!-- container end.// -->
</section>
<!-- Blog -->

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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the close button
        var closeBtn = document.getElementById('closeBtn');

        // Add click event listener to the close button
        closeBtn.addEventListener('click', function() {
            // Remove the 'exit=success' query parameter from the URL
            var urlWithoutQuery = window.location.href.split('?')[0];
            history.replaceState({}, document.title, urlWithoutQuery);
            // Reload the page
            location.reload();
        });
    });
    </script>
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