<?php    session_start();    if(isset($_SESSION['loggedin']))    {        header("Location: http://localhost/sql-injection/index.php");    }    $dbhost = "localhost";    $dbuser = "root";    $dbpass = "";    $dbname = "main_db";    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, 3306);    try {        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);        // set the PDO error mode to exception        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    } catch(PDOException $e) {        echo "Connection failed: " . $e->getMessage();    }    if($_SERVER['REQUEST_METHOD'] == "POST") {        if(isset($_POST['username']) && isset($_POST['password']))        {            if($_POST['security'] == 0 )            {                $query = "SELECT * FROM Users WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] ."'";            }            else if($_POST['security'] == 1)            {                $username = preg_replace('/[^A-Za-z0-9. -]/', '', $_POST['username']);                $password = preg_replace('/[^A-Za-z0-9. -]/', '', $_POST['password']);                $query = "SELECT * FROM Users WHERE username='" . $username . "' AND password='" . $password ."'";            }            try{                $prep = $conn->prepare($query);                $prep->execute();                $rows = $prep->rowCount();                $results = $prep->fetchAll(PDO::FETCH_ASSOC);                if($rows > 0)                {                    $_SESSION['loggedin'] = "OK";                    $_SESSION['username'] = $_POST['username'];//                    echo("<script>window.location.replace('http://localhost/sql-injection/index.php');</script>");                }                else                {                    echo("<script>alert('Wrong credentials!')</script>");                    echo($query);                }            }            catch(PDOException $e)            {                echo("<script>alert('SQL Injection attempt!')</script>");            }        }    }?>    <html>    <head>        <meta name="viewport" content="width=device-width, initial-scale=1">        <style>            body {font-family: Arial, Helvetica, sans-serif;}            form {border: 3px solid #f1f1f1;}            input[type=text], input[type=password] {                width: 100%;                padding: 12px 20px;                margin: 8px 0;                display: inline-block;                border: 1px solid #ccc;                box-sizing: border-box;            }            button {                background-color: #4CAF50;                color: white;                padding: 14px 20px;                margin: 8px 0;                border: none;                cursor: pointer;                width: 100%;            }            button:hover {                opacity: 0.8;            }            .cancelbtn {                width: auto;                padding: 10px 18px;                background-color: #f44336;            }            .imgcontainer {                text-align: center;                margin: 24px 0 12px 0;            }            img.avatar {                width: 40%;                border-radius: 50%;            }            .container {                padding: 16px;            }            span.psw {                float: right;                padding-top: 16px;            }            /* Change styles for span and cancel button on extra small screens */            @media screen and (max-width: 300px) {                span.psw {                    display: block;                    float: none;                }                .cancelbtn {                    width: 100%;                }            }        </style>        <title>Super Duper Secure Site</title>    </head>    <body>    <h2>Super Secure Site</h2>    <form method="post">        <div class="imgcontainer">            <h2>Hey! feel free to hack your way in :)</h2>        </div>        <div class="container">            <label for="uname"><b>Username</b></label>            <input type="text" placeholder="Enter Username" name="username" required>            <label for="psw"><b>Password</b></label>            <input type="password" placeholder="Enter Password" name="password" required>            <select name="security">                <option value="0">No Sanitization</option>                <option value="1">Sanitized</option>            </select>            <button type="submit">Login</button>        </div>    </form>    <form method="POST" action="show_query.php">        <input name="results" type="hidden" value="<?=$results?>">        <input name="query" type="hidden" value="<?=$query?>">        <button type="submit">Print Results</button>    </form>    </body>    </html>