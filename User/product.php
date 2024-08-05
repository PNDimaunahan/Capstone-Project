<?php
session_start(); // Starting the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Products Page</title>
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
  <!-- Navbar -->
  <!-- Heading -->
  <div class="nav-bg">
  <div class="container py-4 d-flex justify-content-between align-items-center">
    <h3 class="text-white mb-0">Products</h3>
    <!-- Breadcrumb -->
    <nav>
      <h6 class="mb-0">
        <a href="index.php" class="text-white-50">Home</a>
        <span class="text-white-50 mx-2"> > </span>
        <a href="product.php" class="text-white"><u>Products</u></a>
      </h6>
    </nav>
    <!-- Breadcrumb -->
  </div>
</div>
<!-- Heading -->
  <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
  <!-- Jumbotron -->
  <div class="bg-primary text-white py-5"
                                style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url('./assets/banner/banner-6.png'); 
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
        To provide high quality products that will benefit health and wellness of the people
      </p>
    </div>
  </div>
  <!-- Jumbotron -->
</header>
<!--header-->

<div class="container mt-4">
  <h3>Categories</h3>
  <div class="row text-center">
    <div class="col-md-2 ">
      <div class="card">
        <a href="medicalproduct.php">
        <img src="./assets/category/category-0.png" class="card-img-top" alt="Medical" style="height: auto;">
        </a>
        <div class="card-body">
          <h5 class="card-title">Medical</h5>
          <p class="card-text">See Products</p>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card" >
        <a href="dentalproduct.php">
        <img src="./assets/category/category-1.png" class="card-img-top" alt="Dental" style="height: auto;">
        </a>
        <div class="card-body">
          <h5 class="card-title">Dental</h5>
          <p class="card-text">See Products</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Products -->
<section>
  <div class="container my-5">
    <header class="mb-4">
      <h3>Top Selling</h3>
    </header>
    <?php
      require 'Include/db.handler.inc.php';
      $basePath = '../Admin/html/Include/';
      // Note: Fetch product data from the database
      $sql = "SELECT ProductID, product_image, Name, Price FROM tbl_product LIMIT 4";
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
                </div>
                <!-- Rating stars can be added here if available -->
                <p class="card-text">₱ <?php echo $product['Price']; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>  
</section>
<!-- Products -->

<!-- Features -->
<section>
  <div class="container">
    <div class="card p-4" style="background-color: #28a745;">
      <div class="row align-items-center">
        <div class="col">
          <h4 class="mb-0 text-white">Medical Supplies</h4>
          <p class="mb-0 text-white-50">Click in the see more to see all of the products</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Features -->

<!-- Products -->
<section >
  <div class="container my-5">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <header class="mb-4">
          <h3> Dental Products</h3>
        </header>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <header class="mb-4 text-end">
          <a href="dentalproduct.php" class="see-more btn btn-sm rounded-pill px-3 py-2" style="background-color: #7b7a72;">See more</a>
        </header>
      </div>
      <?php
      require 'Include/db.handler.inc.php';
      $basePath = '../Admin/html/Include/';
      // Fetch product data from the database (assuming $pdo is your PDO object)
      $sql = "SELECT ProductID, product_image, Name, Price 
              FROM tbl_product 
              WHERE typeid = 2
              LIMIT 4";
      $stmt = $pdo->query($sql);
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class=" col-md-12 col-sm-6 d-flex">
        <?php foreach ($products as $product): ?> 
        <div class="card m-2 w-100 my-2 shadow-2-strong">
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
                </div>
            <div class="card-body d-flex flex-column">
              <p class="card-text">₱ <?php echo $product['Price']; ?></p>
            </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
</section>
<!-- Products -->
<!-- Products -->
<section >
  <div class="container my-5">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <header class="mb-4">
          <h3> Medical Products</h3>
        </header>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <header class="mb-4 text-end">
          <a href="medicalproduct.php" class="see-more btn btn-sm rounded-pill px-3 py-2" style="background-color: #7b7a72;">See more</a>
        </header>
      </div>
      <?php
      require 'Include/db.handler.inc.php';
      $basePath = '../Admin/html/Include/';
      // Note: Fetch product data from the database
      $sql = "SELECT ProductID, product_image, Name, Price 
              FROM tbl_product 
              WHERE typeid = 1
              LIMIT 4";
      $stmt = $pdo->query($sql);
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class=" col-md-12 col-sm-6 d-flex">
        <?php foreach ($products as $product): ?> 
        <div class="card m-2 w-100 my-2 shadow-2-strong">
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
                </div>
              <div class="card-body d-flex flex-column">
                <p class="card-text">₱ <?php echo $product['Price']; ?></p>
              </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
</section>
<!-- Products -->


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