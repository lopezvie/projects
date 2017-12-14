<?php

/*
 * Author: Omar Lopez Vie 
 *  */

class Database {

    private $admin = 'admin';
    private $adminPwd = '2525';
    private $host = '209.129.8.7';
    private $user = 'lopezvie';
    private $pass = 'Anthony1';
    private $dbname = 'lopezvie_48947';
    private $userT = 'users';
    private $productT = 'product';
    private $cartT = 'cart';
    private $conn;

    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        //Check connection
        if ($this->conn->connect_error) {
            die("Data Base Connection Failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }

    public function insertDB($n, $e, $p, $u) {
        $query = "INSERT INTO " . $this->userT . "
                       (user_name,user_email,user_password,
                        user_initDate,user_alias) VALUES ('" . $n . "' , '" . $e . "' , '" . $p . "' , '" . date('Ymd') . "' , '" . $u . "');";
        if ($this->conn->query($query) === TRUE) {
            echo "<h1>User Registered in " . $this->dbname . "</h1>";
            header("Location: loginPage.html");
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    public function selectU($uid, $pwd) {
        $sql = "SELECT * FROM users WHERE user_name='$uid' AND user_password='$pwd'";
        $result = $this->conn->query($sql);

        if (!$row = $result->fetch_assoc()) {
            echo "Invalid User";
            header("Location: loginPage.html");
        } else {
            $_SESSION["id_user"] = $row["id_user"]; //****************** Redirect User to Home Page ->header("Location: loginPage.php");
            header("Location: storeHome.php");
        }
    }

    public function selectDB() {
        $query = "SELECT id_user, user_name, user_email, user_password, user_initDate, user_alias FROM " . $this->userT;
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Date</th><th>User Name</th><th>Update User</th><th>Delete User</th></tr>";
            // output data of each row
            while ($re = $result->fetch_assoc()) {
                echo "<tr><td>" . $re["id_user"] . "</td>";
                echo "<td>" . $re["user_name"] . "</td> ";
                echo "<td>" . $re["user_email"] . "</td>";
                echo "<td>" . $re["user_password"] . "</td>";
                echo "<td>" . $re["user_initDate"] . "/td";
                echo "<td>" . $re["user_alias"] . "</td>";
                echo '<td><form action="updateFirst.php" method="post"><div id="buttons"><button id="update" type="submit" name="submit" value="' . $re["id_user"] . '">update</button></div></form></td>';
                echo '<td><form action="delete.php" method="post"><div id="buttons"><button id="delete" type="submit" name="submit" value="' . $re["id_user"] . '">delete</button></div></form></td>';
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

    public function displayCart($ui) {
        $sum = 0.0;
        $name = $_GET["product"];
        $q1 = "SELECT product_name,product_price FROM " . $this->productT . " WHERE product_name='" . $name . "';";
        $r1 = $this->conn->query($q1);
        if ($r1->num_rows > 0) {
            while ($re = $r1->fetch_assoc()) {
                $pn = $re["product_name"];
                $pr = $re["product_price"];
            }
        }
        $q2 = "INSERT INTO " . $this->cartT . "
                       (id_user,product_name,product_price) VALUES ('" . $ui . "' , '" . $pn . "' , '" . $pr . "');";
        $this->conn->query($q2);
        $q3 = "SELECT id_user, product_name, product_price FROM " . $this->cartT . " WHERE id_user='" . $ui . "';";
        $r8 = $this->conn->query($q3);
        if ($r8->num_rows > 0) {
            echo "<table><tr><th>Product</th><th>Price</th></tr>";
            while ($re = $r8->fetch_assoc()) {
                echo "<tr><td>" . $re["product_name"] . "</td>";
                echo "<td>" . $re["product_price"] . "</td></tr>";
                $sum += $re["product_price"] * 1;
            }
            echo "<tr><td style='float:right;'>Total    " . $sum . "</td></tr>";
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

    public function displayProduct() {
        $query = "SELECT product_name, product_desc, product_price, product_img FROM " . $this->productT . ";";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($re = $result->fetch_assoc()) {
                echo "<div class='case'>";
                echo "<h1>" . $re["product_name"] . "</h1><br>";
                echo "<img class='imgCase' src='" . $re["product_img"] . "'>";
                echo "<p>" . $re["product_desc"] . "</p>";
                echo "<form action='cart.php' method='get'><button name='product' value='" . $re["product_name"] . "' class='btn'>"
                . $re["product_price"] . "</button></form></div>";
            }
        } else {
            echo "0 results";
        }
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function getadminPWD() {
        return $this->adminPwd;
    }

    public function creteTable($tableName) {
        $argUsers = "CREATE TABLE " . $tableName . "(
        id_user int(11) not null AUTO_INCREMENT PRIMARY KEY,
        user_name varchar(256) not null,
        user_email varchar(256) not null,
        user_password varchar(256) not null,
        user_initDate date not null,
        user_alias varchar(256) not null
        );";

        if ($this->conn->query($argUsers) === TRUE) {
            echo "Table Created Remotely";
        } else {
            echo "Error: Table was NOT Created " . $this->conn->error . "<br>";
        }
    }

    public function createDB($database) {
        $argUsers = "CREATE DATABASE " . $database . ";";

        if ($this->conn->query($argUsers) === TRUE) {
            echo "Database Created Remotely";
        } else {
            echo "Error: Database was NOT Created " . $this->conn->error . "<br>";
        }
    }

    public function deleteUser($user_id) {
        $argUsers = "DELETE FROM " . $this->userT . " WHERE id_user='" . $user_id . "';";

        if ($this->conn->query($argUsers) === TRUE) {
            echo "User Deleted";
            header("Location: admin.php");
        } else {
            echo "Error: " . $this->conn->error . "<br>";
        }
    }

    public function updateUser($user_id, $user_name, $user_email, $user_password, $user_alias) {
        $argUsers = "UPDATE " . $this->userT . " SET "
                . " user_name='" . $user_name . "',"
                . " user_email='" . $user_email . "',"
                . " user_password='" . $user_password . "',"
                . " user_alias='" . $user_alias . "'"
                . " WHERE id_user = '" . $user_id . "';";

        echo $argUsers;
        if ($this->conn->query($argUsers) === TRUE) {
            echo "User Updated";
            header("Location: admin.php");
        } else {
            echo "Error: " . $this->conn->error . "<br>";
        }
    }

    public function createUser($n, $e, $p, $u) {
        $query = "INSERT INTO " . $this->userT . "
                       (user_name,user_email,user_password,
                        user_initDate,user_alias) VALUES ('" . $n . "' , '" . $e . "' , '" . $p . "' , '" . date('Ymd') . "' , '" . $u . "');";
        if ($this->conn->query($query) === TRUE) {
            echo "<h1>User Registered in " . $this->dbname . "</h1>";
            header("Location: admin.php");
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

}

$db = new Database();

