<?php
// Include database connection
require 'db.handler.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Check if the form is submitted for updating
if(isset($_POST['btnupdate'])) {
    // Retrieve form data and record ID
    $recordId = $_POST['product_id'];
    $expiryDate = $_POST['expiryDate'];
    $productSize = $_POST['productSize'];
    $productType = $_POST['productType'];
    $productPrice = $_POST['productPrice'];
    $productName = $_POST['productName'];
    $description = $_POST['description'];

    // Check if a new image is uploaded
    if(isset($_FILES['productImage']) && $_FILES['productImage']['size'] > 0) {
        // Handle file upload logic here
        $uploadDirectory = './Products/';
        $uploadedFile = $_FILES['productImage'];

        // File details
        $uploadedFileName = $uploadedFile['name'];
        $uploadedFileTempName = $uploadedFile['tmp_name'];
        $uploadedFilePath = $uploadDirectory . $uploadedFileName;

        // Check if file is uploaded successfully
        if (move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
            // File upload successful
        } else {
            // Error handling for file upload failure
            echo "Error uploading file.";
            exit();
        }
    } else {
        // No new image uploaded, retain the current image path
        // Fetch current image path from the database
        $sql_fetch_image = "SELECT product_image FROM tbl_product WHERE ProductID = :product_id";
        $stmt_fetch_image = $pdo->prepare($sql_fetch_image);
        $stmt_fetch_image->execute([':product_id' => $recordId]);
        $currentImage = $stmt_fetch_image->fetchColumn();

        // Use current image path as the value of $uploadedFilePath
        $uploadedFilePath = $currentImage;
    }

    // Update the record in the database
    $sql = "UPDATE tbl_product SET Name=?, Description=?, Price=?, SizeID=?, ExpiryDate=?, TypeID=?, product_image=? WHERE ProductID=?";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$productName, $description, $productPrice, $productSize, $expiryDate, $productType, $uploadedFilePath, $recordId]);

        header("location: ../product-list.php?success=1");
        exit();
    } catch(PDOException $e) {
        // Handle database error
        echo "Error updating product: " . $e->getMessage();
        exit();
    }
}
?>