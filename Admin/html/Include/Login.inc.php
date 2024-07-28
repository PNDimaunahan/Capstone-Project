<?php
session_start();

if (isset($_POST['loginbtn'])) {
    if (empty($_POST['uname']) || empty($_POST['pwd'])) {
        header("location: ../login.php?error=emptyfields");
        exit();
    }

    require 'db.handler.inc.php';

    $user = $_POST['uname'];
    $pass = $_POST['pwd'];

    try {
        // Prepare SQL statement
        $sql = "SELECT u.user_id, u.user_name, u.password
                FROM tbl_user u
                LEFT JOIN tbl_staff e ON u.user_id = e.user_id_fk
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
                header("location: ../login.php?error=wrongpassword");
                exit();
            }
        } else {
            // User does not exist
            header("location: ../login.php?error=nouser");
            exit();
        }
    } catch(PDOException $e) {
        // Handle database error
        header("location: ../login.php?error=sqlerror");
        exit();
    }
} else {
    // Redirect to login page if login form is not submitted
    header("location: ../login.php?error=forbidden");
    exit();
}
?>