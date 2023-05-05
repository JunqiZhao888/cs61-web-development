<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

    $title = $_POST['title'];
    $year = $_POST['year'];

     // connect to database
    //$dbpath = getcwd() . '/database/movies.db';
    include 'config.php';

    $db = new SQLite3($dbpath);
    $result = false;

    if($title && $year) {

        // insert a record into our table
        $sql = "SELECT id, title, year FROM movies WHERE title = :title AND year = :year";
        $statement = $db->prepare($sql);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':title', $title);
        $result = $statement->execute();
        $rows_affected = $db->changes();
        
        // header("Location: add_form.php");
        // exit();

    } else if($title) {
     
        // insert a record into our table
        $sql = "SELECT id, title, year FROM movies WHERE title = :title";
        $statement = $db->prepare($sql);
        $statement->bindValue(':title', $title);
        $result = $statement->execute();
        $rows_affected = $db->changes();
    
        // header("Location: add_form.php");
        // exit();

    } else if($year) {
     
        // insert a record into our table
        $sql = "SELECT id, title, year FROM movies WHERE year = :year";
        $statement = $db->prepare($sql);
        $statement->bindValue(':year', $year);
        $result = $statement->execute();
        $rows_affected = $db->changes();
      
        // header("Location: add_form.php");
        // exit();

    }

    if($result) {
        $data_to_send_back = array();

        while ($row = $result->fetchArray()) {

            $data = array();
            $data['id'] = $row[0];
            $data['title'] = $row[1];
            $data['year'] = $row[2];
        
            array_push($data_to_send_back, $data);
        }
        print json_encode($data_to_send_back);
    }

    $db->close();
    unset($db);
        




?>