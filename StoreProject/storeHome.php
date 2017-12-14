<?php
session_start();
include 'DatabaseClass.php';
$user = strtoupper($_SESSION['user']);
?>
<html>
    <head>
        <title>Store Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/styleRegisterPage.css">
        <link rel="stylesheet" href="css/caseStyle.css">
    </head>
    <body>
        <ul>
            <li><a class="active" href="#home"><?php echo $user; ?></a></li>
            <li><a class="active" href="#home">HOME</a></li>
            <li><a href="destroySession.php">SIGN OUT</a></li>
        </ul>
        <?php
        $db->displayProduct();
        ?>
    </body>
</html>
