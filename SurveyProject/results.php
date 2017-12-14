<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();

include 'DatabaseClass.php';
$username = $_SESSION['username'];
$username = strtoupper($username);
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
            <li><a class="active"><?php echo $username ?></a></li>
            <li><a href="surveyHome.php">HOME</a></li>
            <li><a href="destroySession.php">SIGN OUT</a></li>
        </ul>
        <?php
        echo "<table><tr><th>Results</th></tr>";
            for($i=1;$i<$_SESSION['counter']+1;$i++){
                echo "<tr><td>Question ".$i.": ".$_GET["array".$i]."</td></tr>";
            }
        ?>
        </table>
    </body>
</html>