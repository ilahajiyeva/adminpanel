<?php
require "../db.php";

if(isset($_POST['name']) && !empty($_POST['name'])) {

    $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (:name)");
    $stmt->execute($_POST);
    
    header("Location: ./index.php");

} else {
    echo "Validation Error!";
}

?>