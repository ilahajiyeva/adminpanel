<?php
require "../db.php";

if(isset($_POST['title'], $_POST['description'], $_FILES['image']) &&
 !empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['image'])) {

    //images
    $filePath = "/storage/pages/" . rand(10,100000) . $_FILES['image']['name'];
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . "/adminpanel" . $filePath;
    $_POST['image'] = $filePath;
    $checkFile = move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);

    if($checkFile) {

        $stmt = $conn->prepare("INSERT INTO pages (title, description, image) VALUES(?,?,?)");
        $stmt->execute([$_POST['title'], $_POST['description'], $fullPath]);

        header("Location: ./index.php");

    } else {
        echo "Image could not find";
    }
    

} else {
    echo "Validation Error!";
}

?>