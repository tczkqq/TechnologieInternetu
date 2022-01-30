<?php
require ('../database.php');

$db = new DbHandler();

$email = $_POST['email'];
$password = $_POST['password'];


session_start();

$_SESSION['user'] = $db -> login($email, $password);
if (is_null($_SESSION['user'])) {
    setcookie('errormsg', 'Błędne dane', time() + 3600, "/");
    header('Location: ../error_handler.php');
} else {
    if ($_SESSION['user']['Typ'] == 1) $_SESSION['is_admin'] = true;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}







?>