<?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!$username || !$password) {
        header('Location: register_form.php?msg=Data cannot be empty!');
        exit();
    }
        
    $db = new SQLite3(  getcwd() . '/database/users.db'  );

    $sql = "insert into users(username, password) values(:username, :password)";
    $statement = $db->prepare($sql);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);

    try {
        $result = $statement->execute();
    } catch(Exception $e) {
        header('Location: register_form.php?msg='.$username.'has already existed!');
        exit();
    }

    if(!$result) {
        header('Location: register_form.php?msg='.$username.' has already existed!');
    } else {
        header('Location: register_form.php?msg=You registered successfully!');
    }

?>