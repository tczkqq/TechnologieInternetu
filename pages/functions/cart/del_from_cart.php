<?php
session_start();

require_once('../init.php');


$tmp = array(
    "product_id" => $_POST['product_id'],
    "times" => $_POST['times']
);

if ($_POST['times'] > 1) {
    $_SESSION['cart'][$_POST['product_id']] = intval($_POST['times']);
} else {
    unset($_SESSION['cart'][$_POST['product_id']]);
}



header('Location: ' . $_SERVER['HTTP_REFERER']);
?>