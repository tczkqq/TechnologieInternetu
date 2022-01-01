<?php
require ('../database.php');

session_start();

$db = new DbHandler();

$client = array (
    'nazwa' => $_POST['nazwa'],
    'telefon' => $_POST['telefon'],
    'adres' => $_POST['adres']
);
if (isset($_SESSION['user']))
    $client['IDKlient'] = $_SESSION['user']['IDKlient'];


$order = $db -> makeOrder(
    $_SESSION['cart'],
    $client
);


if (is_null($order)) {
    echo "<h1>Błędne dane</h1>";
} else {
    echo "<h1> Success </h1>";
    #header('Location: ' . $_SERVER['HTTP_REFERER']);
}







?>