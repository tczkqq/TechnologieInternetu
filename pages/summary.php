<?php require ('../imports.php');
require ('../header.php'); ?>
    

<h1> Zamówienie nr. <?php echo $_COOKIE['order']; ?> zostało złożone </h1>
<?php 
require_once ('./functions/database.php');
$db = new DbHandler();
$order = $db -> getOrderByID($_COOKIE['order']);
include_once ('partials/cart-preview.php');
?>
Miejsce Dostawy: <?php echo $order['MiejsceDostawy']; ?> </br>
Data zamowienia: <?php echo $order['DataZamowienia']; ?> </br>
<?php if (isset($order['DataDostawy'])) {?>
Data dostawy: <?php echo $order['DataDostawy']; ?>

<?php
} 
#unset($_SESSION['cart']);
unset($db);
require ('../footer.php') 
?>;