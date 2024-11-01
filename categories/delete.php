<?php
require "../db.php";

if(isset($_GET['id'])) {

    $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    
    header("Location: ./index.php");

} else {
    echo "Validation Error!";
}

?>