<!doctype html>
<html>
    <head>
        <title>Movie Database</title>
        <style>

            .nav {
                border: solid 1px black;
                text-decoration: none;
                padding: 5px;
            }

            .nav:hover {
                background-color: orange;
            }

            table {
                border-collapse: collapse;
            }

            td, th {
            border: 1px solid black;
            padding: 5px;
            }

        </style>
    </head>
    <body>
        <h1>My Movie Database: View</h1>

        <?php
            include('header.php');
            print '<br>';
        ?>

        <!-- grab all movies from the database and display to the user -->
        <?php

            // connect to database
            //$dbpath = getcwd() . '/database/movies.db';
            include 'config.php';

            $db = new SQLite3($dbpath);


            // set up a SQL query to get all movies from the table
            $sql = "SELECT id, title, year FROM movies";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
        
            print '<table>';
            print "
                <tr>
                    <td>title</td>
                    <td>year</td>
                    <td>options</td>
                </tr>
            ";
            
            // iterate over those movies and generate output
            while ($array = $result->fetchArray()) {
                print "<tr>";
                    print "<td>".$array['title']."</td>";
                    print "<td>".$array['year']."</td>";
                    print "<td>".'<a href="delete.php?id='.$array['id'].'">Delete</a>'."</td>";
                print "</tr>";
            }

            $db->close();
            unset($db);

            print "</table>";
        ?>



    </body>

</html>