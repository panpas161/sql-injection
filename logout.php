<?php
    session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['username']);
    header("Location: http://superdupersecuresite.000webhostapp.com/");
?>