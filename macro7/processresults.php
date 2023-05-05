<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

    // grab the incoming data
    $color = $_POST['color'];
    $weather = $_POST['weather'];
    $college = $_POST['college'];
    $daytime = $_POST['daytime'];

    // validate the data
    if(!$color) {
        // send them back to the form and tell them
        // to fill it out
        header("Location: index.php?error=You forgot your color");
        exit();
    } else if(!$weather) {
        header("Location: index.php?error=You forgot your weather");
        exit();
    } else if(!$college) {
        header("Location: index.php?error=You forgot your college");
        exit();
    } else if(!$daytime) {
        header("Location: index.php?error=You forgot your daytime");
        exit();
    }


    // diagnose which character the user is
    if ($color == 'y') {
        $char = "Homer";
    }
    else if ($color == 'g') {
        $char = "Marge";
    }
    else if ($color == 'b') {
        $char = "Lisa";
    } else {
        $char = "Bart";
    }

    // save the data to a file on the server
    $filename = getcwd() . '/data/results.txt';
    file_put_contents($filename, $char . "\n", FILE_APPEND);

    // set cookie
    setcookie('character', $char);
    setcookie('weather', $weather);
    setcookie('college', $college);
    setcookie('daytime', $daytime);

    // send them back so they can see their result
    header("Location: index.php");
    exit();

?>