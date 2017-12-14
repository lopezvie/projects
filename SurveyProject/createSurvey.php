<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();
$username = $_SESSION['username'];
$username = strtoupper($username);
$_SESSION['Nquest'] ++;

?>
<html>
    <head>
        <title>Survey</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" href="css/surveyHomeStyle.css">
        <link rel="stylesheet" href="css/styleRegisterPage.css">
    </head>
    <body>
        <ul>
            <li><a class="active"><?php echo $username ?></a></li>
            <li><a href="surveyHome.php">HOME</a></li>
            <li><a href="destroySession.php">SIGN OUT</a></li>
        </ul>
        <div>
            <form action="createSurvey2.php" method="post">
                <b style="text-align: center; font-size: 25px;">EDIT YOUR QUESTION No. <?php echo $_SESSION['Nquest']; ?></b><br><br>
                <label for="question">Question No. <?php echo $_SESSION['Nquest']; ?>:</label><br>
                <input type="text" name="question" placeholder="TYPE IN YOUR QUESTION HERE."/><br><br>
                <label for="topic">Topic:</label><br>
                <input type="text" name="topic" placeholder="QUESTION'S SUBJECT"/><br><br>
                <label for="answer1">Answer No 1:</label><br>
                <input type="text" name="answer1" placeholder="TYPE IN ANSWER 1."/><br><br>
                <label for="answer2">Answer No 2:</label><br>
                <input type="text" name="answer2" placeholder="TYPE IN ANWER 2."/><br><br>
                <label for="answer3">Answer No 3:</label><br>
                <input type="text" name="answer3" placeholder="TYPE IN ANSWER 3."/><br><br>
                <button id="btn" type="submit" name="submit">POST</button>
            </form>
            <button id="btn" onclick="window.location.href = 'surveyHome.php'">DONE</button>
        </div>
    </body>
</html>
