<?php
require ('../database.php');

$db = new DbHandler();

$email = $_POST['email'];
$password = $_POST['password'];
$nazwa = $_POST['nazwa'];
$telefon = $_POST['telefon'];
$adres = $_POST['adres'];

$_SESSION['client'] = $db->createClient($telefon, $nazwa);
echo $_SESSION['client'];
$_SESSION['user'] = $db->createUser($email, $password, $_SESSION['client']);

unset($db);
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>