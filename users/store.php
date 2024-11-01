<?php
require "../db.php";

if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_FILES['image']) &&
 !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_FILES['image'])) {

    $stmt = $conn->prepare("INSERT INTO users (name, email,password, image) VALUES(?,?,?,?)");
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

    //images
    $filePath = "/storage/users/" . rand(10,100000) . $_FILES['image']['name'];
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . "/adminpanel" . $filePath;
    $_POST['image'] = $filePath;
    $checkFile = move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);

    if($checkFile) {

        $stmt->execute([$_POST['name'], $_POST['email'],$_POST['password'], $_POST['image']]);

        header("Location: ./index.php");

    } else {
        echo "Image could not find";
    }
    

} else {
    echo "Validation Error!";
}

?>