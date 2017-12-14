<?php 
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();
?>
<html>
    <head>
        <title>Login Form - Survey</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
    </head>
    <body>
        <?php
        include 'DatabaseClass.php';

        if (isset($_POST['submit'])) {
            $uid = $_POST['uid'];
            $pwd = $_POST['pwd'];
            $_SESSION['username'] = $uid;
            $_SESSION['pass'] = $pwd;
            $db->selectU($uid, $pwd);
        } else {
            echo "Invalid User";
            header("Location: loginPage.html");
        }
        ?>
    </body>
</html>