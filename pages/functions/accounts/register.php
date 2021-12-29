<?php
require ('../database.php');

$db = new DbHandler();

$email = $_POST['email'];
$password = $_POST['password'];
$nazwa = $_POST['nazwa'];
$telefon = $_POST['telefon'];
$adres = $_POST['adres'];


$_SESSION['user'] = $db->createUser($email, $password, $telefon, $nazwa);
if (is_null($_SESSION['user'])) {
    echo "<h1>Błędne dane</h1>";
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
 
unset($db);


?>