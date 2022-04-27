<?php
    include("functions.php");
    if($_POST['security'] == 0)
    {
        $query = "SELECT * FROM Users WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] ."';";
    }
    else if($_POST['security'] == 1)
    {
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $query = "SELECT * FROM Users WHERE username='" . $username . "' AND password='" . $password  ."';";
    }
    echo $query;
?>
