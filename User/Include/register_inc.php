<?php

if(isset($_POST['btnreg'])) {
    $userName = $_POST['user_name'];
    $passWord = $_POST['password'];
         
    require 'db.handler.inc.php';

    // Hashing the password
    $hashedPassword = password_hash($passWord, PASSWORD_DEFAULT);

    try {
        // Inserting user data into the database with automatic 'customer' user type
        $sql = "INSERT INTO tbl_user (user_name, password, user_type_id_fk) VALUES (?, ?, '2')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userName, $hashedPassword]);

        // Get the user ID of the inserted user
        $user_id = $pdo->lastInsertId();

        // Start or resume the session
        session_start();

        // Set session variable to indicate registration success
        $_SESSION['registration_success'] = true;

        // Set the user ID in the session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user'] = $userName;

        // Redirect to registration page
        header("location: ../Register.php");
        exit();
    } catch(PDOException $e) {
        header("location: ../Register.php?error=sqlerror");
        exit();
    }
} else {
    echo "Forbidden!";
}
?>
