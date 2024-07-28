<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the index page if not logged in
        header("Location: login.php");
        exit;
    }

    $username = $_SESSION['user'];
    $userid = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/h_logo.png">
    <title>Product List</title>
    <!-- This page plugin CSS -->
    <!-- <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- Topbar header - style you can find in pages.scss -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <img src="../assets/images/H.png" alt="No Image" class="img-fluid" style="height: 40px;">
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i data-feather="user" class="svg-icon"></i> 
                                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark"><?= $username ?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="account.php"><i data-feather="user"
                                        class="svg-icon me-2 ms-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="include/logout.inc.php"><i data-feather="power"
                                        class="svg-icon me-2 ms-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" style = "color:green" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Management</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">User Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="manage-users.php" class="sidebar-link"><span
                                            class="hide-menu"> Manage Users
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="customer-details.php" class="sidebar-link"><span
                                            class="hide-menu"> Customer Details
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="employee-details.php" class="sidebar-link"><span
                                            class="hide-menu"> Employee Details
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                    class="hide-menu">Order Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="order-purchase.php" class="sidebar-link"><span
                                            class="hide-menu"> Order Purchasing
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="order-track.php" class="sidebar-link"><span
                                            class="hide-menu"> Order Tracking
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="order-history.php" class="sidebar-link"><span
                                            class="hide-menu"> Order History
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="clipboard" class="feather-icon"></i><span
                                    class="hide-menu">Inventory Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="product-list.php" class="sidebar-link"><span
                                            class="hide-menu"> Product List
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="product-stock.php" class="sidebar-link"><span
                                            class="hide-menu"> Product Stocks
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="shipping.php" class="sidebar-link"><span
                                            class="hide-menu"> Shipping
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fas fa-chart-line"></i><span
                                    class="hide-menu">Sales Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="sales-report.php" class="sidebar-link"><span
                                            class="hide-menu"> Sales Reporting
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="e-invoice.php" class="sidebar-link"><span
                                            class="hide-menu"> E-Invoice Generation
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="icon-earphones-alt"></i><span
                                    class="hide-menu">After Sales Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="refund-and-exchanges.php" class="sidebar-link"><span
                                            class="hide-menu"> Refund or Exchange
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Point of Sales</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="pos-template.php"
                                aria-expanded="false"><i data-feather="monitor" class="feather-icon"></i><span
                                    class="hide-menu">POS
                                </span></a>
                        </li>
                        <li class="list-divider"></li>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">EditProduct</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="product-list.php" class="text-muted">Product List</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Edit Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- order table -->
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product</h4>
                <h6 class="card-subtitle mb-2">In here the user (you), can edit the existing product.</h6>
            </div>
            <div class="card-body">
                <div class="product-form">
                    <?php
                        require './Include/db.handler.inc.php';

                        // Assuming the product_id is obtained from the URL
                        $product_id = $_GET['product_id']; // Make sure to validate and sanitize this input

                        $sql_product_details = "SELECT Name, Price, SizeId, TypeId, expiryDate, Description, product_image
                        FROM tbl_product 
                        WHERE ProductId = :product_id";
                        try {
                            $stmt_product_details = $pdo->prepare($sql_product_details);
                            $stmt_product_details->bindValue(':product_id', $product_id);
                            $stmt_product_details->execute();
                            $productDetails = $stmt_product_details->fetch(PDO::FETCH_ASSOC);
                        } catch(PDOException $e) {
                            // Catch any SQL errors 
                            header("location: ../product-edit-list.php?error=sqlerror");
                            exit();
                        }
                        $sql_sizes = "SELECT SizeId, SizeName FROM tbl_product_size";
                        $stmt_sizes = $pdo->prepare($sql_sizes);
                        $stmt_sizes->execute();
                        $sizes = $stmt_sizes->fetchAll(PDO::FETCH_ASSOC);

                        $sql_types = "SELECT TypeId, TypeName FROM tbl_product_type";
                        $stmt_types = $pdo->prepare($sql_types);
                        $stmt_types->execute();
                        $types = $stmt_types->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <form method="post" action="./Include/update.product.inc.php" enctype="multipart/form-data">
                        <div class="row">

                        <!-- Product Image -->
                        <div class="mb-3">
                            <Center><label for="productImage" class="form-label" style="display: block;">Product Image</label>
                            <img src="../html/Include/<?php echo $productDetails['product_image']; ?>" class="img-fluid rounded-4" alt="Product Image" style="max-width: 100px; max-height: 100px; display: block; margin-top: 5px;">
                            <!-- Display the file name -->
                            <p>Current File: <?php echo $productDetails['product_image']; ?></p></Center>
                            <!-- Input for uploading a new image -->
                            <input type="file" class="form-control" id="productImage" name="productImage">
                        </div>
                            <!-- Product Name -->
                            <div class="col-md-6 mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" value="<?php echo htmlspecialchars($productDetails['Name']); ?>" required>
                            </div>

                            <!-- Product Price -->
                            <div class="col-md-6 mb-3">
                                <label for="productPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice" step="0.01" value="<?php echo htmlspecialchars($productDetails['Price']); ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Product Size -->
                            <div class="col-md-4 mb-3">
                                <label for="productSize" class="form-label">Size</label>
                                <select class="form-control" id="productSize" name="productSize">
                                    <?php foreach ($sizes as $size): ?>
                                        <option value="<?php echo $size['SizeId']; ?>" <?php echo ($size['SizeId'] == $productDetails['SizeId']) ? 'selected' : ''; ?>><?php echo $size['SizeName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Product Type -->
                            <div class="col-md-4 mb-3">
                                <label for="productType" class="form-label">Type</label>
                                <select class="form-control" id="productType" name="productType">
                                    <?php foreach ($types as $type): ?>
                                        <option value="<?php echo $type['TypeId']; ?>" <?php echo ($type['TypeId'] == $productDetails['TypeId']) ? 'selected' : ''; ?>><?php echo $type['TypeName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Expiry Date -->
                            <div class=" col-md-4 mb-3">
                                <label for="expiryDate" class="form-label">Expiry Date</label>
                                <input type="date" class="form-control" id="expiryDate" name="expiryDate" value="<?php echo htmlspecialchars($productDetails['expiryDate']); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"><?php echo htmlspecialchars($productDetails['Description']); ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <!-- Hidden input for product_id -->
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success" name="btnupdate">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved to HealthPal. Designed by <a
                    href="https://adminmart.com/">Adminmart</a> and Modified by HealthPal.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>