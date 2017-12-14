<?php
/*
 * Author: Omar Lopez Vie 
 *  */
session_start();

include 'DatabaseClass.php';
$user=$_SESSION['username'];
$pass=$_SESSION['pass'];
$_SESSION['id']=$db->getUserByID($user,$pass);
$q=$_POST['question'];
$t=$_POST['topic'];
$db->insertQuestion($_SESSION['id'], $q, $t);
$_SESSION['q_id']=$db->getQuestionByID($_SESSION['id'], $q, $t);
$db->insertANS($_SESSION['q_id'], $_SESSION['id'], $_POST['answer1']);
$db->insertANS($_SESSION['q_id'], $_SESSION['id'], $_POST['answer2']);
$db->insertANS($_SESSION['q_id'], $_SESSION['id'], $_POST['answer3']);
header("Location: createSurvey.php");