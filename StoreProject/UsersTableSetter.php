<?php
/*
 * Author: Omar Lopez Vie 
 *  */
include 'DatabaseClass.php';


$dbName="battleship";
$tableName="users";
$db->creteTable($tableName);
$db->createDB($dbName);
