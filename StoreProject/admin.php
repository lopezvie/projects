<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();
?>

<html>
    <head>
        <title>Database Administration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" href="css/tables.css">
    </head>
    <body>
        <?php
        include 'DatabaseClass.php';
        if (isset($_POST['submit'])) {
            $uid = $_POST['uid'];
            $pwd = $_POST['pwd'];
            $_SESSION['user'] = $uid;
            if ($uid === $db->getAdmin() && $pwd === $db->getadminPWD()) {
                $db->selectDB();
            } else {
                echo "Invalid User Credentials: Redirecting you to the Admin Login Page...";
                header("Location: adminPage.html");
            }
        } elseif (isset($_SESSION['user'])) {
            $db->selectDB();
        } else {
            echo "Invalid Entry: Redirecting you to the Admin Login Page...";
            header("Location: adminPage.html");
        }
        ?>
        <div id="buttons">
            <button class="btn" onclick="window.location.href = 'destroySession.php'">SIGN OUT</button>
            <button class="btn" style="display:inline;" onclick="window.location.href = 'createUser.html'">CREATE USER</button>
        </div>
    </body>
</html>
