<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();

include 'DatabaseClass.php';
$username = $_SESSION['username'];
?>
<html>
    <head>
        <title>Survey</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" href="css/tables.css">
        <link rel="stylesheet" href="css/surveyHomeStyle.css">
    </head>
    <body>
        <ul>
            <li><a class="active"><?php echo strtoupper($username); ?></a></li>
            <li><a href="surveyHome.php">HOME</a></li>
            <li><a href="destroySession.php">SIGN OUT</a></li>
        </ul>
        <?php
        $user = $_SESSION['username'];
        $pass = $_SESSION['pass'];
        $_SESSION['id'] = $db->getUserByID($user, $pass);
        $db->displaySurvey($username, $_SESSION['id']);
        ?>
    </body>
</html>
