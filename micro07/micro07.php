<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        //error_reporting(E_ALL);
        //ini_set("display_errors",1);
        if($_COOKIE["login"]) {
            print "You are logged in";
            $cwd = getcwd();
            $data_path = $cwd.'/data/record.txt';
            file_put_contents($data_path,"successful\n",FILE_APPEND);
        } else if($_GET['error']) {
            print $_GET['error'].'<br><br>';
        } 
        
        
        // else if($_GET['msg']) {
        //     print $_GET['msg'].'<br><br>';
        // }
    
    ?>

    <?php
        if(!$_COOKIE['login']) {
    ?>
    <form action="micro07_process.php" method="POST">
        Username <input type="text" name="username"><br>
        Password <input type="text" name="password"><br>
        <input type="submit">
    </form>
    <?php
        }
    ?>

    
</body>
</html>