<?php
require "../db.php";

if(isset($_GET['id'])) {

    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$_GET['id']]);

    $stmt = $conn->prepare("DELETE FROM post_tag WHERE post_id = ?");
    $stmt->execute([$_GET['id']]);
    
    header("Location: ./index.php");

} else {
    echo "Validation Error!";
}

?>