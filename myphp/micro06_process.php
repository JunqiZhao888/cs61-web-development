<?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!$username) {
        header('Location: micro06.php?error=Empty username!');
        exit();
    }

    if(!$password) {
        header('Location: micro06.php?error=Empty password!');
        exit();
    }

    if($username=='pikachu' && $password=='pokemon') {
        header('Location: micro06.php?msg=Hello, welcome to your page!');
        exit();
    } else {
        header('Location: micro06.php?error=You entered wrong username or password. Please try again.');
        exit();
    }

    

?>