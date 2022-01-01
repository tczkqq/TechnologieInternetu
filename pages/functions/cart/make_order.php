<?php
require_once ('../database.php');

session_start();

$db = new DbHandler();

$client = array (
    'nazwa' => $_POST['nazwa'],
    'telefon' => $_POST['telefon'],
    'adres' => $_POST['adres'],
    'DataDostawy' => 'NULL'
);
if (isset($_SESSION['user'])) { 
  $client['IDKlient'] = $_SESSION['user']['IDKlient'];
  if (!$_POST['data'] == "")
    $client['DataDostawy'] = "'{$_POST['data']}'";
}

$order = $db -> makeOrder(
    $_SESSION['cart'],
    $client
);

unset($db);
if (is_null($order)) {
    echo "<h1>Błędne dane</h1>";
} else {
    #echo "<h1> Success </h1>";
    setcookie('order', $order, time() + 3600, "/");
    header('Location: ../../summary.php');
}






?>