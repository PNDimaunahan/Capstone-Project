<?php
if(isset($_POST['btnUpdate'])) {
    require 'db.handler.inc.php';

    $uname = $_POST['uname'];
    $id = $_POST['uid'];
    $utype = $_POST['userType'];

    $sql = "UPDATE tbl_user SET user_name = ?, user_type_id_fk = ? WHERE user_id = ?";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$uname, $utype, $id]);
        header("location: ../manage-users.php?update=success");
        exit();
    } catch(PDOException $e) {
        // Catch any SQL errors
        header("location: ../user-list-edit.php?user_id=" . urlencode($id) . "&error=sqlerror");
        exit();
    }
} else {
    echo "Forbidden!";
}
?>
