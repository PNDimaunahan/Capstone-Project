<?php
session_start(); // Starting the session

require 'Include/db.handler.inc.php';
$basePath = '../Admin/html/Include/';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Product Details</title>
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
                        $addToCartLink = "shopping cart.php";
                    } else {
                        // User is not logged in
                        $loggedIn = false;
                        $addToCartLink = "SignIn.php";
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

<!--Get item name-->
<?php
$product_id = $_GET['id'];

// Retrieve product details from the database
// Note: Needed to edit this to have more functions
$sql_product_details = "SELECT p.Name, p.Price, p.Description, pt.TypeName, ps.SizeName, p.product_image, i.quantity
                        FROM tbl_product p
                        INNER JOIN tbl_product_type pt ON pt.TypeID = p.TypeID
                        INNER JOIN tbl_product_size ps ON ps.SizeID = p.SizeID
                        INNER JOIN tbl_inventory i ON i.ProductID = p.ProductID
                        WHERE p.ProductID = :id";
try {
    $stmt_product_details = $pdo->prepare($sql_product_details);
    $stmt_product_details->bindValue(':id', $product_id);
    $stmt_product_details->execute();
    $productDetails = $stmt_product_details->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Catch any SQL errors
    header("location: ../product-list-edit.php?error=sqlerror");
    exit();
}
?>

<!-- Heading -->
  <div class="nav-bg mb-4">
    <div class="container py-4">
      <h3 class="text-white mt-2">Data</h3>
      <!-- Breadcrumb -->
      <nav class="d-flex mb-2">
        <h6 class="mb-0">
          <a href="index.php" class="text-white-50">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="product.php" class="text-white-50">Products</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="product_detail.php" class="text-white"><u><?php echo $productDetails['Name']; ?></u></a>
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
</header>
<!-- Heading -->

<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="mb-3 d-flex justify-content-center">
          <img class="rounded-4" src="<?php echo $basePath . $productDetails['product_image']; ?>" alt="Product Image" class="card-img-top" style="width: 500px; height: auto;" />
        </div>
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            <?php echo $productDetails['Name']; ?>
          </h4>
          <div class="d-flex flex-row my-3">  
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
          </div>

          <div class="mb-3">
            <span class="h5">₱ <?php echo $productDetails['Price']; ?></span>
            <i class="fas fa-shopping-basket fa-sm mx-1"></i> <?php echo $productDetails['quantity']; ?> in stock</span>
          </div>

          <p>
            <?php echo $productDetails['Description']; ?>
          </p>

          <div class="row">
            <dt class="col-3">Type:</dt>
            <dd class="col-9"><?php echo $productDetails['TypeName']; ?></dd>

            <dt class="col-3">Size:</dt>
            <dd class="col-9"><?php echo $productDetails['SizeName']; ?></dd>
          </div>

          <hr />

          <div class="row mb-4">
              <div class="col-md-4 col-6 mb-3">
                  <label class="mb-2 d-block">Quantity</label>
                  <div class="input-group mb-3" style="width: 170px;">
                      <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark" onclick="decrementQuantity()">
                          <i class="fas fa-minus"></i>
                      </button>
                      <input type="text" id="quantityInput" class="form-control text-center border border-secondary" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                      <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark" onclick="incrementQuantity()">
                          <i class="fas fa-plus"></i>
                      </button>
                  </div>
              </div>
          </div>
          <a href="<?php echo $addToCartLink; ?>" class="btn btn-primary py-2 px-3 shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
          <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->

<!--Lower side of the product details i.e comments, specifications-->
<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-2 bg-white">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" role="tablist">
            <li class="nav-item d-flex">
              <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-bs-toggle="pill" href="#ex1-pills-1">Specification</a>
            </li>
            <li class="nav-item d-flex">
              <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2" data-bs-toggle="pill" href="#ex1-pills-2">Comments</a>
            </li>
          </ul>

          <div class="tab-content" id="ex1-content">
            <div class="container tab-pane fade show active" id="ex1-pills-1">
              <p>
                <?php echo $productDetails['Description']; ?>
              </p>
            </div>  
            <div class="container tab-pane fade" id="ex1-pills-2">
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/40x40" alt="avatar" class="rounded-circle me-2">
                  <div class="text-end">
                    <strong>Author</strong>
                    <span class="small text-muted">January 23, 2021</span>
                  </div>
                </div>
              </div>
              <p>
                Comment text goes here. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              </p>
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/40x40" alt="avatar" class="rounded-circle me-2">
                  <div class="text-end">
                    <strong>Author</strong>
                    <span class="small text-muted">January 24, 2021</span>
                  </div>
                </div>
              </div>
              <p>
                Another comment text goes here. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              </p>
            </div>
          </div>
        <!-- Pills content -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--End Lower side of the product details i.e comments, specifications-->

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
    function incrementQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue)) {
            quantityInput.value = currentValue + 1;
        } else {
            // If currentValue is NaN, set it to 1
            quantityInput.value = 1;
        }
    }

    function decrementQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        } else {
            // If currentValue is NaN or less than 1, set it to 1
            quantityInput.value = 1;
        }
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
