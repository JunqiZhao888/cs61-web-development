<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <style>
            .hidden {
                display: none;
            }
            .warn {
                color: red;
                font-weight: bold;
            }
        </style>     
    </head>
    <body>
        <div id="register">
            <form id="myForm" method="post" action="register.php">
                username:
                <input id="username" type="text" name="username"> <br>
                password:
                <input id="password" type="text" name="password"> <br>
                <?php
                    print '<p class="warn">'.$_GET['msg'].'</p>';
                ?>
                <button id="submit" type="submit">Submit</button>
            </form>         
        </div>

        <div>
            <a href="index.html">Home</a>
        </div>

        <script>
           
        </script>
       

    </body>
</html>