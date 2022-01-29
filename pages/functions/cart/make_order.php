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
$diff = -2;
if (isset($_SESSION['user'])) { 
  $client['IDKlient'] = $_SESSION['user']['IDKlient'];
  if (!$_POST['data'] == "") {
    date_default_timezone_set('Europe/Warsaw');
    $var1 = date('Y-m-d h:i:s a', time());
    $var2 = date('Y-m-d h:i:s a', strtotime($_POST['data']));
    $var1 = strtotime($var1);
    $var2 = strtotime($var2);
    
    $diff = ($var1 - $var2)/ ( 60 * 60 );
    if ($diff > -1) {
        setcookie('errormsg', 'Minimalny czas realizacji to 1h', time() + 3600, "/");
        header('Location: ../error_handler.php');
    }
    $client['DataDostawy'] = "'{$_POST['data']}'";
  }
}
$order = $db -> makeOrder(
    $_SESSION['cart'],
    $client
);
unset($db);
if (is_null($order)) {
    setcookie('errormsg', 'Twój koszyk jest pusty', time() + 3600, "/");
    header('Location: ../error_handler.php');
} else if (!(is_null($order)) && ($diff < -1)) {
    setcookie('order', $order, time() + 3600, "/");
    header('Location: ../../summary.php');
} 






?>