<?php
require ('../database.php');

$db = new DbHandler();

session_start();

$order = $db -> makeOrder();
echo var_dump($order)


if (is_null($order) {
    echo "<h1>Błędne dane</h1>";
} else {
    echo "<h1> Success </h1>"
    #header('Location: ' . $_SERVER['HTTP_REFERER']);
}







?>