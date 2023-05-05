
<!DOCTYPE html>
<html lang="en">
<head>
        <style>
            body {
			    background-image: url("assignment07_images/pic.png");
                background-repeat: no-repeat;
                background-size: cover;
		    }

            #header {
                text-align: center;
                font-family: Helvetica, serif;
                font-weight: bold;
                font-size: 2em;
            
            }
        </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

    <a href="index.php"><h1 id='header'>Go to the main page!</h1></a><br>

    <?php


        // start by opening the text file
        $filename = getcwd() . '/data/results.txt';

        $data = file_get_contents($filename);

        if(!$data) {
            print "No data available yet";
        } else {

            $bart = 0;
            $homer = 0;
            $lisa = 0;
            $marge = 0;

            $arr = explode("\n", $data);

            for($i=0;$i<count($arr);$i++) {
                if($arr[$i]=='Bart') {
                    $bart++;
                } else if($arr[$i]=='Homer') {
                    $homer++;
                } else if($arr[$i]=='Lisa') {
                    $lisa++;
                } else if($arr[$i]=='Marge') {
                    $marge++;
                }
            }
    ?>

        Bart:
        <div id="a" class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 100%"></div>
        </div>
        Homer:
        <div id="b" class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
            <div  class="progress-bar bg-info" style="width: 100%"></div>
        </div>
        Lisa:
        <div id="c" class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div  class="progress-bar bg-warning" style="width: 100%"></div>
        </div>
        Marge:
        <div id="d" class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <div  class="progress-bar bg-danger" style="width: 100%"></div>
        </div>

        <script>
            let bart = <?php echo $bart; ?>;
            let homer = <?php echo $homer; ?>;
            let lisa = <?php echo $lisa; ?>;
            let marge = <?php echo $marge; ?>;

            let total = bart+homer+lisa+marge;

            let a = document.querySelector('#a');
            let b = document.querySelector('#b');
            let c = document.querySelector('#c');
            let d = document.querySelector('#d');

            a.setAttribute('aria-valuenow',bart/total*100);
            b.setAttribute('aria-valuenow',homer/total*100);
            c.setAttribute('aria-valuenow',lisa/total*100);
            d.setAttribute('aria-valuenow',marge/total*100);

            a.firstElementChild.style.width = bart/total*100+"%";
            b.firstElementChild.style.width = homer/total*100+"%"
            c.firstElementChild.style.width = lisa/total*100+"%";
            d.firstElementChild.style.width = marge/total*100+"%";

            a.firstElementChild.innerHTML = bart/total*100+"%";
            b.firstElementChild.innerHTML = homer/total*100+"%"
            c.firstElementChild.innerHTML = lisa/total*100+"%";
            d.firstElementChild.innerHTML = marge/total*100+"%";
        </script>
    <?php
        }
    ?>
    
</body>
</html>


