<?php
session_start();
?>
<html>
    <head>
        <title>Login Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
    </head>
    <body>
        <?php
        /*
         * Author: Omar Lopez Vie 
         *  */
        include 'DatabaseClass.php';

        if (isset($_POST['submit'])) {
            $_SESSION['user'] = $_POST['uid'];
            $_SESSION['pwd'] = $_POST['pwd'];

            $db->selectU($_SESSION['user'], $_SESSION['pwd']);
        } else {
            echo "Invalid User";
            // remove all session variables
            session_unset();
            // destroy the session 
            session_destroy();
            header("Location: loginPage.html");
        }
        ?>
    </body>
</html>