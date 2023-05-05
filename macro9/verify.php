<?php

    $username = $_POST['username'];
    $password = $_POST['password'];
        
    $db = new SQLite3(  getcwd() . '/database/users.db'  );

    $sql = "select username, password from users where username = :username";
    $statement = $db->prepare($sql);
    $statement->bindParam(':username', $username);
    $result = $statement->execute();

    $temp_array = $result->fetchArray();

    //print $temp_array['username'].'|'.$temp_array['password'];

    $db->close();
    unset($db);

    if(!$temp_array || $temp_array['password']!=$password) {
        print 'false';
        exit();
    }

    print 'true';


?>