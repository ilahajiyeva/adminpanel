<?php

require "../db.php";

if(isset($_POST['email'], $_POST['password']) && 
!empty($_POST['email']) && !empty($_POST['password'])) {

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($_POST['password'], ($user['password']))){

        $_SESSION['user_id'] = $user['id'];
        header("Location: ../index.php");
    } else {
        echo "Email or Password is wrong";
    }

} else {
    echo "Validation Error!";
}


?>