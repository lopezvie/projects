<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();

$username = $_SESSION['username'];
$username = strtoupper($username);
$_SESSION['Nquest'] = 0;
?>
<html>
    <head>
        <title>Survey</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" href="css/surveyHomeStyle.css">
    </head>
    <body>
        <ul>
            <li><a class="active"><?php echo $username ?></a></li>
            <li><a class="active" href="#home">HOME</a></li>
            <li><a href="destroySession.php">SIGN OUT</a></li>
        </ul>
    <botton onclick="window.location.href = 'createSurvey.php'" id="one">Post A New Question</botton>
    <botton onclick="window.location.href = 'displaySurvey.php'" id="two">See Your Existing Question/s</botton>
</body>
</html>

