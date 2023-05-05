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
        <h1>My Movie Database: Search</h1>
        <?php
            include('header.php');
            print '<br>';
        ?>
        
       <!-- <form method="POST" action="search.php">
        Title: <input id='title' type="text" name="title"><br>
        Year: <input id='year' type="text" name="year"><br> 
        <input type="submit" value="search"> 
        </form> -->

        Title: <input id='title' type="text" name="title"><br>
        Year: <input id='year' type="text" name="year"><br> 
        <button id="search">Search</button>
        <div id="board">
        </div>

        <script>
            const search_btn = document.querySelector("#search");
            const board = document.querySelector("#board");

            search_btn.onclick = function(event) {

                let v1 = document.querySelector('#title').value;
                let v2 = document.querySelector('#year').value;

                let result = performFetch({
                    url: "search.php",
                    method: "POST",
                    data: {title: v1, year: v2},
                    success: function(data) {
                        
                        let final_data = JSON.parse(data);

                        for(let i=0;i<final_data.length;i++) {

                            let str = final_data[i]['id']+":"+final_data[i]['title']+":"+final_data[i]['year'];
                            let p = document.createElement('p');
                            p.innerText = str;
                            board.appendChild(p);

                        }
                    
                    
                    },
                    error: function(error) {}
                });

                

            }

            function performFetch(args) {

    // GET requests
    if (args.method && args.method.toLowerCase() == 'get') {

        // package up the data to send to the server
        const params = new URLSearchParams();
        for (const varName in args.data) {
            params.append(varName, args.data[varName]);
        }

        // append variables to URL
        args.url += '?' + params.toString();

        // perform the fetch request
        fetch(args.url)
            .then(function(response) {
                if (response.ok) {
                    return response.text();
                }
                else {
                    let error = new Error("server error");
                    throw error;
                }
            })
            
            // call the provided success callback function
            .then(function(text) {
                args.success(text);
            })
            
            // call the provided error callback function
            .catch(function(error) {
                args.error(error);
            });

    } // end GET request

    // POST requests
    else if (args.method && args.method.toLowerCase() == 'post') {

        // package up the data to send to the server
        // note that this is designed specifically to contact a PHP script
        // we will use a slightly different approach when we contact
        // node.js scripts in the next unit
        const formData = new FormData();
        for (const key in args.data) {
            if (args.data.hasOwnProperty(key)) {
                formData.append(key, args.data[key]);
            }
        }

        // perform the fetch request
        fetch(args.url, {
            method: "POST",
            body: formData,
        })
        .then(function(response) {
            if (response.ok) {
                return response.text();
            }
            else {
                let error = new Error("server error");
                throw error;
            }
        })
        
        // call the provided success callback function        
        .then(function(text) {
            args.success(text);
        })
        
        // call the provided error callback function        
        .catch(function(error) {
            args.error(error);
        });

    } // end POST request

}
        </script>
        
    </body>

</html>