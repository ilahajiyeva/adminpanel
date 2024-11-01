<?php
require "../db.php";

if(isset($_POST['title'], $_POST['category_id'], $_POST['description'], $_POST['tags'], $_FILES['image']) &&
 !empty($_POST['title']) && !empty($_POST['category_id']) && !empty($_POST['description']) &&
 !empty($_POST['tags']) && !empty($_FILES['image'])) {

    //images
    $filePath = "/storage/posts/" . rand(10,100000) . $_FILES['image']['name'];
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . "/adminpanel" . $filePath;
    $_POST['image'] = $filePath;
    $checkFile = move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);

    if($checkFile) {

        $stmt = $conn->prepare("INSERT INTO posts (title, category_id, description, image) VALUES(?,?,?,?)");
        $stmt->execute([$_POST['title'], $_POST['category_id'], $_POST['description'], $_POST['image']]);

        //tags

        $lastId = $conn->lastInsertId(); //en sonuncu postun id-si

        foreach($_POST['tags'] as $tag) {
            $stmt = $conn->prepare("INSERT INTO post_tag (post_id, tag_id) VALUES(?,?)");
            $stmt->execute([$lastId, $tag]);
        }


        header("Location: ./index.php");

    } else {
        echo "Image could not find";
    }
    

} else {
    echo "Validation Error!";
}

?>