<?php

    $id = $_GET['id'];

    // connect to database
    //$dbpath = getcwd() . '/database/movies.db';
    include 'config.php';


    $db = new SQLite3($dbpath);

    // insert a record into our table
    $sql = "DELETE FROM movies WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $rows_affected = $db->changes();

    $db->close();
    unset($db);

    // redirect them back so they can add more movies to the database
    header("Location: index.php");
    exit();


?>