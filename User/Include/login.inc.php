<?php
session_start();

if (isset($_POST['loginbtn'])) {
    if (empty($_POST['user']) || empty($_POST['pass'])) {
        header("location: ../SignIn.php?error=emptyfields");
        exit();
    }

    require 'db.handler.inc.php';

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    try {
        // Prepare SQL statement
        $sql = "SELECT u.user_id, u.user_name, u.password
                FROM tbl_user u
                LEFT JOIN tbl_customer c ON u.user_id = c.user_id_fk
                LEFT JOIN tbl_cart cart ON u.user_id = cart.user_id
                WHERE u.user_name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user]);

        // Check if a row is returned
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Verify password
            if (password_verify($pass, $row['password'])) {
                // Successful login
                $_SESSION['user'] = $user;
                $_SESSION['user_id'] = $row['user_id'];
                header("location:../index.php");
                exit();
            } else {
                // Invalid password
                header("location: ../SignIn.php?error=wrongpassword");
                exit();
            }
        } else {
            // User does not exist
            header("location: ../SignIn.php?error=nouser");
            exit();
        }
    } catch(PDOException $e) {
        // Handle database error
        header("location: ../SignIn.php?error=sqlerror");
        exit();
    }
} else {
    // Redirect to login page if login form is not submitted
    header("location: ../SignIn.php?error=forbidden");
    exit();
}
?>
