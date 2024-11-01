<?php

require "../db.php";


if(isset($_GET['id'], $_POST['name'],  $_POST['email'],  $_POST['password'],  $_FILES['image']) &&
 !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_FILES['image'])) {

    $_POST['id'] = $_GET['id'];
    
    if (empty($_FILES['image']['name'])) {
        
        $sql = "UPDATE users SET name=?, email=?, password=? WHERE id=?";

        if(!empty($_POST['password'])) {

            $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

        } 

    } else {

        $sql = "UPDATE users SET name=?, email=?, image=? WHERE id=?";
        $filePath = "/storage/users/" . rand(5,666666) . $_FILES['image']['name'];
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/adminpanel' . $filePath;
        move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
        $_POST['image'] = $filePath;
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['name'], $_POST['email'], $_POST['image'], $_GET['id']]);
        unset($_POST['password']);

    }
    
    header("Location: ./index.php");

} else {
    echo "Validation Error!";
}

?>