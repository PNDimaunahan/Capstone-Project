<?php
session_start();
// Enable error reporting
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'db.handler.inc.php';
      // Assuming form fields are named appropriately
      $user_id_fk = $_SESSION['user_id'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $address = $_POST['address'];

      // Default user_type_id_fk to 2 if not provided in the form
      $user_type_id_fk = isset($_POST['user_type_id_fk']) ? $_POST['user_type_id_fk'] : 2;

      // Check if user data already exists in the database
      $query_check = "SELECT * FROM tbl_staff WHERE user_id_fk = ?";
      $stmt_check = $pdo->prepare($query_check);
      $stmt_check->execute([$user_id_fk]);
      $existingData = $stmt_check->fetch(PDO::FETCH_ASSOC);

      if ($existingData) {
        // Update existing user data in tbl_customer
        $query_update = "UPDATE tbl_staff SET first_name = ?, last_name = ?, email = ?, address = ?, user_type_id_fk = ? WHERE user_id_fk = ?";
        $stmt_update = $pdo->prepare($query_update);
        if ($stmt_update->execute([$first_name, $last_name, $email, $address, $user_type_id_fk, $user_id_fk])) {
            $_SESSION['success'] = "User data updated successfully.";
            header("location: ../account.php?success");
            exit; // Terminate script after sending response
        } else {
            $_SESSION['error'] = "Failed to update user data.";
            header("location: ../account.php");
            exit;
        }
    } else {
        // Insert new user data into tbl_staff
        $query_insert = "INSERT INTO tbl_staff (user_id_fk, first_name, last_name, email, address, user_type_id_fk) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert = $pdo->prepare($query_insert);
        if ($stmt_insert->execute([$user_id_fk, $first_name, $last_name, $email, $address, $user_type_id_fk])) {
            $_SESSION['success'] = "User data inserted successfully.";
            header("location: ../account.php?success");
            exit;
        } else {
            $_SESSION['error'] = "Failed to insert user data.";
            header("location: ../account.php");
            exit;
        }
    }
  }
?>