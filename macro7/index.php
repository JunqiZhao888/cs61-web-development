<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz!</title>
        <style>

            #error {
                background-color: red;
                color: white;
                padding: 10px;
                font-size: 200%;
            }

            #header {
                text-align: center;
                font-family: Helvetica, serif;
                font-weight: bold;
                font-size: 2em;
            
            }

            .f {
                display: flex;
                justify-content: center;
            }

            body {
			    background-image: url("assignment07_images/pic.png");
                background-repeat: no-repeat;
                background-size: cover;
		    }

        </style>

    </head>
    <body>
        <h1 id="header">Welcome to the Page!</h1>
        <?php


// error_reporting(E_ALL);
// ini_set("display_errors", 1);

            if ($_COOKIE['character']) {
                print '<div class="f">';
                print "<div>You are " . $_COOKIE['character'] . "</div>";
                print "<div>, who likes ".$_COOKIE['weather'].', '.$_COOKIE['college'].', and '.$_COOKIE['daytime']."</div>";
                $img_src = "assignment07_images/".$_COOKIE['character'].".png";
                print '<img src="'.$img_src.'"></img>';
                print "</div>";

                print '<div class="f">';
                print "<a href=clear.php>Try Again</a>";
                print "</div>";

            }

            else {
        ?>

        <?php
            if ($_GET['error']) {
        
                print '<div id="error">'.$_GET['error'].'</div>';

            }
        ?>

        <div class="f">
            <form action="processresults.php" method="POST">

                Favorite Color:
                <select name="color" id="color" title="a fruit">
                    <option value="">Select a color</option>
                    <option value="y">Yellow</option>
                    <option value="g">Green</option>
                    <option value="b">Blue</option>
                    <option value="p">Pink</option>
                </select>

                <!-- <br> -->

                Favorite Weather:
                <select name="weather" id="weather" title="a weather">
                    <option value="">Select a weather</option>
                    <option value="spring">Spring</option>
                    <option value="summer">Summer</option>
                    <option value="autumn">Autumn</option>
                    <option value="winter">Winter</option>
                </select>

                <!-- <br> -->

                Favorite College:
                <select name="college" id="college" title="a college">
                    <option value="">Select a college</option>
                    <option value="MIT">MIT</option>
                    <option value="Harvard">Harvard</option>
                    <option value="Stanford">Stanford</option>
                    <option value="NYU">NYU</option>
                </select>

                <!-- <br> -->

                Favorite Daytime:
                <select name="daytime" id="daytime" title="a daytime">
                    <option value="">Select a daytime</option>
                    <option value="morning">Morning</option>
                    <option value="afternoon">Afternoon</option>
                    <option value="night">Night</option>
                </select>

                <input type="submit">
            </form>

        </div>
    
        <?php
            }
        ?>

        <div class="f">
            <a href="result.php">Click here to see all the results!</a>
        </div>

      

    </body>
</html>
