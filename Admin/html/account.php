<?php
    session_start();

    require_once './include/db.handler.inc.php';

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the index page if not logged in
        header("Location: login.php");
        exit;
    }

    date_default_timezone_set('Asia/Manila');

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
    <link rel="icon" type="image/png" sizes="24x24" href="../assets/images/h_logo.png">
    <title>HealthPal DashBoard</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> 
                                <span class="text-dark"><?= $username ?></span> <i data-feather="chevron-down"
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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <!--Section-->
              <!--List Nav-->
                <div class="container container-wrapper">
                  <div class="row justify-content-center">
                <!--Profile Summary-->    
                    <div class="col-lg-3">
                          <div class="card">
                              <div class="card-body">
                                  <ul class="rounded nav nav-pills mb-3 d-flex flex-column" id="pills-tab" role="tablist">
                                      <li class="nav-item flex-fill" role="presentation">
                                          <a class="nav-link active" id="pills-prof-summary" data-bs-toggle="pill" data-bs-target="#pills-profile-summary" href="#profile-summary" role="tab" aria-controls="profile-summary" aria-selected="true" style="border-radius: 0 0 0 0;">
                                              <i class="fas fa-file-alt"></i> <span>Profile Summary</span>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
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
                                            $query_customer = "SELECT * FROM tbl_staff WHERE user_id_fk = ?";
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
                                                  <input class="form-control" id="inputUsername" type="text" placeholder="Username" value="<?php echo $username; ?>" readonly>
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
                        </div>
                        <!--section-->           
                          </div>
                      </div>        
            <!--Section-->
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
    <script>
        function toggleForm() {
        var form = document.getElementById('profileForm');
        var editButton = document.getElementById('editButton');
        var saveButton = document.getElementById('saveButton');
        var formFields = form.querySelectorAll('input');

        if (editButton.innerHTML === 'Edit') {
            // Enable form fields for editing
            formFields.forEach(function(field) {
                field.removeAttribute('readonly');
                field.disabled = false;
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>