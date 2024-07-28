<?php
// Include database connection
require 'db.handler.inc.php';

// Check if the form is submitted
if(isset($_POST['btnreg'])) {
    // Retrieve form data
    $expiryDate = $_POST['expiryDate'];
    $productSize = $_POST['productSize'];
    $productType = $_POST['productType'];
    $productPrice = $_POST['productPrice'];
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $initialStock = $_POST['initialStock'];

    // Handle file upload
    $uploadDirectory = './Products/';
    $uploadedFile = $_FILES['productImage'];

    // File details
    $uploadedFileName = $uploadedFile['name'];
    $uploadedFileTempName = $uploadedFile['tmp_name'];
    $uploadedFilePath = $uploadDirectory . $uploadedFileName;

    // Convert date format from HTML form to MySQL format (YYYY-MM-DD)
    $formattedExpiryDate = date('Y-m-d', strtotime($expiryDate));

    // Move uploaded file to the upload directory
    if (move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
        // Insert product into the database
        $sql_insert_product = "INSERT INTO tbl_product (Name, Description, Price, SizeID, ExpiryDate, TypeID, product_image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        try {
            $stmt_insert_product = $pdo->prepare($sql_insert_product);
            $stmt_insert_product->execute([$productName, $description, $productPrice, $productSize, $formattedExpiryDate, $productType, $uploadedFilePath]);

            // Get the ID of the newly inserted product
            $productId = $pdo->lastInsertId();

            // Insert initial stock into tbl_inventory
            $sql_insert_stock = "INSERT INTO tbl_inventory (ProductID, quantity) VALUES (?, ?)";
            $stmt_insert_stock = $pdo->prepare($sql_insert_stock);
            $stmt_insert_stock->execute([$productId, $initialStock]);

            // Redirect to success page or display success message
            header("location: ../product-list.php?success=1");
            exit();
        } catch(PDOException $e) {
            // Handle database error
            echo "Error adding product: " . $e->getMessage();
            exit();
        }
    } else {
        echo "Error uploading file.";
        exit();
    }
}
?>

	


