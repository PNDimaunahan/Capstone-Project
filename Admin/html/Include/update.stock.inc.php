<?php
// Include database connection
require 'db.handler.inc.php';

// Check if the form is submitted for updating
if(isset($_POST['btnupdate'])) {
    // Retrieve form data
    $inventoryId = $_POST['inventory_id'];
    $quantity = $_POST['quantity'];

    // Update the record in the database
    $sql = "UPDATE tbl_inventory SET quantity=? WHERE inventoryid=?";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$quantity, $inventoryId]);
        
        // Redirect to success page or display success message
        header("location: ../product-stock.php?success=1");
        exit();
    } catch(PDOException $e) {
        // Handle database error
        echo "Error updating stock: " . $e->getMessage();
        exit();
    }
}
?>