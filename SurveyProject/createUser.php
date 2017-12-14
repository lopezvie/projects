<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();
include 'DatabaseClass.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$email = $_POST['email'];

if (preg_match('/^[A-Za-z0-9_-]{3,16}$/', $uid)) {
    if (preg_match('/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})$/', $pwd)) {
        if (preg_match('/^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/', $email)) {
            $db->createUser($name, $email, $pwd, $uid);
        } else {
            echo "Invalid Email";
            header("Location: registerPage.html");
        }
    } else {
        echo "Invalid Password";
        header("Location: registerPage.html");
    }
} else {
    echo "Invalid User Name";
    header("Location: registerPage.html");
}
?>
</body>
</html>
