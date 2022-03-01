<?php
    $results = $_POST['results'];
    $query = $_POST['query'];
    echo($query);
    echo("<table style='width:100%;border:1px solid;text-align: center;'><tr>");
    echo("<th>Username</th>");
    echo("<th>Password</th>");
    echo("</tr>");
    echo("<tr>");
    echo("<td>" + $results['username'] + "</td>");
    echo("<td>" + $results['password'] + "</td>");
    echo("</tr></table>");
    echo($results);
?>