<?php
session_start();

require_once('init.php');

array_push($_SESSION['cart'], $_POST['product_id']);


# Back to previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>