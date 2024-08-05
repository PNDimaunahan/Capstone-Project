<?php
session_start(); // Starting the session
require 'Include/db.handler.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Dental Product</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/h_logo.png">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
<!-- Heading -->
  <div class="nav-bg mb-4">
    <div class="container py-4">
      <h3 class="text-white mt-2">All Medical Products</h3>
      <!-- Breadcrumb -->
      <nav class="d-flex mb-2">
        <h6 class="mb-0">
          <a href="index.php" class="text-white-50">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="product.php" class="text-white-50">Products</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="dentalproduct.php" class="text-white"><u>Dental Products</u></a>
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
<!-- Heading -->
</header>

<!-- sidebar + content -->
<section class="">
  <div class="container">
    <div class="row">
      <!-- sidebar -->
      <div class="col-lg-3" style="margin-top: 60px;">
        <!-- Collapsible wrapper -->
        <div class="collapse card d-lg-block mb-5">
        <div class="accordion">
          <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button text-dark bg-light" type="button" data-bs-toggle="collapse" aria-expanded="true">
                      Brands
                  </button>
              </h2>
              <div class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                  <div class="accordion-body">
                    <div>
                      <!-- Checked checkbox -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked />
                        <label class="form-check-label" for="flexCheckChecked1">Partners</label>
                        <span class="badge badge-secondary float-end">120</span>
                      </div>
                      <!-- Checked checkbox -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked />
                      <label class="form-check-label" for="flexCheckChecked2">Protect</label>
                    <span class="badge badge-secondary float-end">15</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="accordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      Price
                    </button>
                  </h2>
                  <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="row mb-3">
                        <div class="col-6">
                          <p class="mb-0">
                            Min
                          </p>
                          <div class="form-outline">
                            <input type="number" id="typeNumber" class="form-control" />
                            <label class="form-label" for="typeNumber">₱0</label>
                          </div>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">
                            Max
                          </p>
                          <div class="form-outline">
                            <input type="number" id="typeNumber" class="form-control" />
                            <label class="form-label" for="typeNumber">₱50,000</label>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-white w-100 border border-secondary">apply</button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="accordion">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Ratings
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <!-- Default checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked>
                      <label class="form-check-label" for="flexCheckDefault1">
                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                      </label>
                    </div>
                    <!-- Default checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" checked>
                      <label class="form-check-label" for="flexCheckDefault2">
                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-secondary"></i>
                      </label>
                    </div>
                    <!-- Default checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" checked>
                      <label class="form-check-label" for="flexCheckDefault3">
                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                      </label>
                    </div>
                    <!-- Default checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4" checked>
                      <label class="form-check-label" for="flexCheckDefault4">
                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar -->
      <!-- content -->
      <div class="col-lg-9" style="margin-top: 60px;">
        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
          <?php
          $sql = "SELECT COUNT(*) AS item_count FROM tbl_product WHERE typeid = 2";
          $stmt = $pdo->query($sql);
          $item_count = $stmt->fetch(PDO::FETCH_ASSOC)['item_count']; // Fetching the count directly
          ?>
          <strong class="d-block py-2"><?php echo $item_count; ?> Items found </strong>
          <div class="ms-auto">
            <select class="form-select d-inline-block w-auto border pt-1">
              <option value="0">Best match</option>
              <option value="1">Recommended</option>
              <option value="2">High rated</option>
              <option value="3">Randomly</option>
            </select>
          </div>
        </header>
      <!-- content -->
<!--Product List-->
<div class="row justify-content-center mb-3" id="productList">
  <div class="col-md-12">
    <?php
      
      $basePath = '../Admin/html/Include/';

      // Pagination logic
      $perPage = 5; // Number of items per page
      $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page number
      $start = ($page - 1) * $perPage; // Calculate starting point for fetching items

      // Fetch product data from the database (assuming $pdo is your PDO object)
      $sql = "SELECT ProductID, product_image, Name, Price, description FROM tbl_product WHERE typeid = 2 LIMIT $start, $perPage";
      $stmt = $pdo->query($sql);
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <div class="row justify-content-center mb-3" id="productList">
        <div class="col-md-12">
          <!-- Product Items -->
          <?php foreach ($products as $product): ?> 
          <div class="card shadow-0 border rounded-3 mb-3">
            <div class="card-body">
              <div class="row g-0">
                <!-- Product Image Column -->
                <div class="col-xl-3 col-md-4 d-flex justify-content-center">
                  <!-- Product Image -->
                  <div class="hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                    <a href="product_detail.php?id=<?php echo $product['ProductID']; ?>">
                      <img src="<?php echo $basePath . $product['product_image']; ?>" alt="Product Image" class="card-img-top" style="aspect-ratio: 1 / 1" />
                    </a>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </div>
                </div>
                <!-- Product Details Column -->
                <div class="col-xl-6 col-md-5 col-sm-7">
                  <!-- Product Title -->
                  <h5><?php echo $product['Name']; ?></h5>
                  <!-- Rating and Orders -->
                  <div class="d-flex flex-row">
                    <div class="text-warning mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                      <span class="ms-1">4.5</span>
                    </div>
                    <span class="text-muted">154 orders</span>
                  </div>
                  <!-- Product Description -->
                  <p class="text mb-4 mb-md-0 w-75">
                  <?php 
                    $description = $product['description'];
                    $maxLength = 100; // Maximum length of the description
                    if (strlen($description) > $maxLength) {
                      $description = substr($description, 0, $maxLength) . '...'; // Truncate the description
                    }
                    echo $description; 
                    ?>
                  </p>
                </div>
                <!-- Product Price Column -->
                <div class="col-xl-3 col-md-3 col-sm-5">
                  <!-- Product Price -->
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">₱ <?php echo $product['Price']; ?></h4>
                  </div>
                  <!-- Shipping Information -->
                  <h6 class="text-success">Free shipping around Tarlac area</h6>
                  <!-- Buttons -->
                  <div class="mt-4">
                    <a class="btn btn-primary shadow-0" href="product_detail.php?id=<?php echo $product['ProductID']; ?>">
                       Details
                    </a>
                    <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover"><i class="fas fa-heart fa-lg px-1"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <?php
      // Count total number of items
      $totalItems = $pdo->query("SELECT COUNT(*) FROM tbl_product WHERE typeid = 2")->fetchColumn();
      $totalPages = ceil($totalItems / $perPage); // Calculate total number of pages

      // Pagination links
      ?>

      <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
        <ul class="pagination">
          <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>

          <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
<!--Product List-->
        <hr/>
      </div>
    </div>
  </div>            
</section>
<!-- sidebar + content -->

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
 
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
