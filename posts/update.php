<?php

require "../db.php";



if(isset($_GET['id'], $_POST['title'], $_POST['category_id'], $_POST['description'], $_POST['tags'],  $_FILES['image']) &&
 !empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['image'])) {

    $_POST['id'] = $_GET['id'];
    $sql = "UPDATE posts SET title=:title, category_id =:category_id, description=:description ";
    
    //images
    if (!empty($_FILES['image']['name'])) {

        $filePath = "/storage/pages/" . rand(5,666666) . $_FILES['image']['name'];
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/adminpanel' . $filePath;
        move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
        $_POST['image'] = $filePath;
        $sql .= ", image=:image ";
        
    }

    $sql .= " WHERE id=:id";
    $stmt = $conn->prepare($sql);
    //tags
    $tags = $_POST['tags'];
    unset($_POST['tags']);

    $stmt->execute($_POST);

    //tags
    $deletedAllTags = $conn->prepare("DELETE FROM post_tag WHERE post_id = ?");
    $deletedAllTags->execute([$_GET['id']]);

    foreach($tags as $tag) {
        $stmt = $conn->prepare("INSERT INTO post_tag (post_id,tag_id) VALUES(?,?)");
        $stmt->execute([$_GET['id'], $tag]);
    }


    header("Location: ./index.php");

} else {
    echo "Validation Error!";
}

?>