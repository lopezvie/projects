<html>
    <head>
        <title>Registration Form</title>
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

        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        if (preg_match('/^[A-Za-z0-9_-]{3,16}$/', $uid)) {
            if (preg_match('/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})$/', $pwd)) {
                if (preg_match('/^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/', $email)) {
                    $db->insertDB($name, $email, $pwd, $uid);
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

