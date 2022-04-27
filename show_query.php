<?php
    include("database/Connection.php");
    include("functions.php");
    $conn = new Connection();
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
    $conn->executeQuery($query);
    $results = $conn->getQuery()->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <head>

    </head>
    <body>
        <label>Total Results:</label>
        <label><?=$conn->getQuery()->rowCount()?></label>
        <div style="border:1px solid black;text-align: center;padding-top:12px;padding-bottom:12px;">
            <?=$query?>
        </div>
        <table style='width:100%;border:1px solid;text-align: center;'>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Password</th>
                <th>Access</th>
            </tr>
                <?php
                if(!empty($results)){
                    foreach($results as $result){?>
                <tr>
                    <td><?=$result['id']?></td>
                    <td><?=$result['username']?></td>
                    <td><?=$result['password']?></td>
                    <td><?=$result['access']?></td>
                </tr>
                <?php }}; ?>
        </table>
    </body>
</html>
