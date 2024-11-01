<?php
require "../db.php";

if(isset($_GET['id'], $_POST['name']) && !empty($_POST['name'])) {

    $_POST['id'] = $_GET['id'];
    $stmt = $conn->prepare("UPDATE tags SET name=:name WHERE id = :id");
    $stmt->execute($_POST);
    
    header("Location: ./index.php");

} else {
    echo "Validation Error!";
}

?>