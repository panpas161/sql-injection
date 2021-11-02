<?php
session_start();
if(isset($_SESSION['loggedin']))
{
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
        include($page);
    }
    else
    {
        include("pages/dashboard.php");
    }
}
else
{
    header("Location: http://superdupersecuresite.000webhostapp.com/login.php");
}
?>
