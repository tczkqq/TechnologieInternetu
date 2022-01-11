
<?php 
require ('../imports.php');
echo '<link rel="stylesheet" href="../static/css/menu.css">';
echo '<script src="../static/js/cart.js"></script>';
require ('../header.php');
require ('./functions/database.php');

$db = new DbHandler();

if (!empty($_SESSION['cart'])) {
?>
<form action="checkout.php" id="checkout">
    <button type="submit"> Przejdz dalej </button>
</form>
<?php
}
foreach ($_SESSION['cart'] as $key => $item) {
    $dish = $db->getDishById ($key);
?>


    <article class="product">
        <img src="..\media\img\<?php echo $dish['Okladka']; ?>" alt="pierogi" class="cover sum">
        <div class="description">
            <h1><?php echo $dish['Nazwa']; ?></h1>
        </div>
        <form action="./functions/cart/del_from_cart.php" method="post" class="modify">
            <div class="inp">
                <input type="hidden" name="product_id" value="<?php echo $dish['IDPotrawy']; ?>"> </input>  
                <a> <i class="fas fa-plus" class="deladd" onclick="updateAmount('<?php echo $dish['IDPotrawy']; ?>', true);"></i> </a>
                <input type="number" class="amount" name="times" value="<?php echo $_SESSION['cart'][$dish['IDPotrawy']]; ?>" id="<?php echo $dish['IDPotrawy']; ?>"> 
                <a> <i class="fas fa-minus" class="deladd" onclick="updateAmount('<?php echo $dish['IDPotrawy']; ?>', false);"></i> </a>
            </div>
            <button type="submit" class="addToCart btn"><i class="fas fa-edit"></i></button>
        </form>
    </article>

<?php 
}
unset($db);

if (empty($_SESSION['cart'])) {
    echo "<h1> Koszyk pusty :( </h1>";
} else {
?>


<form action="checkout.php" id="checkout">
    <button type="submit"> Przejdz dalej </button>
</form>

<?php } include('../footer.php');  ?>