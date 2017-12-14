<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();
    $_SESSION['id_user'] = $_POST['submit'];
?>
<html>
    <head>
        <title>Update User - Administrator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" href="css/styleRegisterPage.css">
    </head>
    <body>
        <div>
            <form action="update.php" method="post">
                <?php echo $_POST['submit'] ?>
                <b style="text-align: center; font-size: 25px;">User Update Form</b><br><br>
                <label for="uid">USERNAME: </label><br>
                <input type="text" name="uid" placeholder="Username"/><br><br>
                <label for="pwd">PASSWORD:</label><br>
                <input type="password" name="pwd" placeholder="Password"/><br><br>
                <label for="name">NAME:</label><br>
                <input type="text" name="name" placeholder="Name"/><br><br>
                <label for="email">E-MAIL:</label><br>
                <input type="text" name="email" placeholder="E-Mail"/><br><br>
                <button id="btn" type="submit" name="submit">UPDATE</button><br>
            </form>        
        </div>
    </body>
</html>