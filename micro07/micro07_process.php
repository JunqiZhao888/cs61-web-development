<?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cwd = getcwd();
    $data_path = $cwd.'/data/record.txt';

    if(!$username) {
        file_put_contents($data_path,"missing\n",FILE_APPEND);
        header('Location: micro07.php?error=Empty username!');
        exit();
    }

    if(!$password) {
        file_put_contents($data_path,"missing\n",FILE_APPEND);
        header('Location: micro07.php?error=Empty password!');
        exit();
    }

    if($username=='pikachu' && $password=='pokemon') {
        
        setcookie("login","yes");

        header('Location: micro07.php?msg=Hello, welcome to your page!');
        exit();
    } else {
        file_put_contents($data_path,"unsuccessful\n",FILE_APPEND);
        header('Location: micro07.php?error=You entered wrong username or password. Please try again.');
        exit();
    }

    

?>