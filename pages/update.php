<?php

require "../db.php";



if(isset($_GET['id'], $_POST['title'],  $_POST['description'],  $_FILES['image']) &&
 !empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['image'])) {

    $_POST['id'] = $_GET['id'];
    
    if (empty($_FILES['image']['name'])) {
        
        $sql = "UPDATE pages SET title=?, description=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['title'], $_POST['description'], $_GET['id']]);

    } else {

        $sql = "UPDATE pages SET title=?, description=?, image=? WHERE id=?";
        $filePath = "/storage/pages/" . rand(5,666666) . $_FILES['image']['name'];
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/adminpanel' . $filePath;
        move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
        $_POST['image'] = $filePath;
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['title'], $_POST['description'], $_POST['image'], $_GET['id']]);

    }
    
    header("Location: ./index.php");

} else {
    echo "Validation Error!";
}

?>