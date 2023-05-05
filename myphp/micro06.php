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

        if($_GET['error']) {
            print $_GET['error'].'<br><br>';
        } else if($_GET['msg']) {
            print $_GET['msg'].'<br><br>';
        }
    
    ?>

    <form action="micro06_process.php" method="POST">
        Username <input type="text" name="username"><br>
        Password <input type="text" name="password"><br>

        <input type="submit">
    </form>
    
</body>
</html>