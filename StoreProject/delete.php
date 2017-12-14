<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();

include 'DatabaseClass.php';

$temp = $_POST['submit'];

$db->deleteUser($temp);

echo $temp;



