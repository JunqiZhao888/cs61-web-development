
<?php

    // delete the 'character' cookie
    setcookie('character', '', time() - 3600);
    setcookie('weather', '', time() - 3600);
    setcookie('college', '', time() - 3600);
    setcookie('daytime', '', time() - 3600);

    // send them back to quiz.php
    header('Location: index.php');


?>