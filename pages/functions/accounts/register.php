<?php
require ('../database.php');

$db = new DbHandler();

$email = $_POST['email'];
$password = $_POST['password'];
$nazwa = $_POST['nazwa'];
$telefon = $_POST['telefon'];
$adres = $_POST['adres'];


$_SESSION['user'] = $db->createUser($email, $password, $telefon, $nazwa, $adres);
if (is_null($_SESSION['user'])) {
    setcookie('errormsg', 'Już istnieje użytkownik z takim adresem email', time() + 3600, "/");
    header('Location: ../error_handler.php');
} else {
    $_SESSION['user'] = $db -> login($email, $password);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
 
unset($db);


?>