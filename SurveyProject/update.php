<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();
?>
<html>
    <head>
        <title>Update User - Administrator - Survey</title>
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
            $name = $_POST['name'];
            $email = $_POST['email'];
            $user_id = $_SESSION['id_user'];
            if (preg_match('/^[A-Za-z0-9_-]{3,16}$/', $uid)) {
                if (preg_match('/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})$/', $pwd)) {
                    if (preg_match('/^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/', $email)) {
                        $db->updateUser($user_id, $name, $email, $pwd, $uid);
                    } else {
                        echo "Invalid Email";
                        header("Location: updateFirst.php");
                    }
                } else {
                    echo "Invalid Password";
                    header("Location: updateFirst.php");
                }
            } else {
                echo "Invalid User Name";
                header("Location: updateFirst.php");
            }
            
        } else {
            echo "Error: Update NOT possible";
        }
        ?>
    </body>
</html>