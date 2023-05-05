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

            .warn {
                font-style: italic;
                color: red;
            }

        </style>
    </head>
    <body>
        <h1>My Movie Database: Add</h1>
        <?php
            include('header.php');
            print '<br>';

            $msg = $_GET['msg'];

            if($msg=="no") {
                //fail
                print '<h3 class="warn">You have to fill in all the data blanks</h3>';
            } else if($msg=="yes") {
                print '<h3 class="warn">Add data successfully</h3>';
            }

        ?>

        <form id='form' method="POST" action="add_save.php">
            Title: <input id='title' type="text" name="title"><br>
            Year: <input id='input' type="text" name="year"><br>
            <input type="submit" value="Add Movie">
        </form> 

    </body>

</html>