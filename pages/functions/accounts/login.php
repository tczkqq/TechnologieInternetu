<?php
require ('../database.php');

$db = new DbHandler();

$email = $_POST['email'];
$password = $_POST['password'];


session_start();

$_SESSION['user'] = $db -> login($email, $password);
if (is_null($_SESSION['user'])) {
    echo "<h1>Błędne dane</h1>";
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}







?>