<?php
session_start();

require_once('init.php');


$tmp = array(
    "product_id" => $_POST['product_id'],
    "times" => $_POST['times']
);

if (intval($tmp["times"])>0) {
    if (in_array($tmp["product_id"], $_SESSION["cart"])) {
        $_SESSION["cart"][$tmp["product_id"]] -= intval($_POST['times']);
    } 
} else {
    header("Location: ../../400.php");
    
}


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>