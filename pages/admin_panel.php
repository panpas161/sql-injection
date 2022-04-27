<?php
    include("database/Connection.php");
    if(!(isset($_SESSION['loggedin'])) || !($_SESSION['access'] >= 1))
    {
        die("Access Denied!");
    }
    $conn = new Connection();
    $conn->executeQuery("SELECT * FROM Users");
    $results = $conn->getQuery()->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <title>Admin Panel</title>
    </head>
    <body>
        <div class="head">
            <h1>Under Construction</h1>
            <h3>Admin Panel</h3>
        </div>
        <table>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Password</th>
                <th>Access</th>
                <th>Actions</th>
            </tr>
            <?php
            if(!empty($results)){
                foreach($results as $result){?>
                <tr>
                    <td><?=$result['id']?></td>
                    <td><?=$result['username']?></td>
                    <td><?=$result['password']?></td>
                    <td><?=$result['access']?></td>
                    <td>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
            <?php }}; ?>
        </table>
    </body>
</html>

<style>
    .head
    {
        text-align: center;
    }
    table
    {
        width:100%;
        border:1px solid;
        text-align: center;
    }
</style>