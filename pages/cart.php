
<?php 
require ('../header.php');
require ('./functions/database.php');

$db = new DbHandler();

foreach ($_SESSION['cart'] as $key => $item) {
    $dish = $db->getDishById ($key);
?>

    <article class="product">
        <img src="..\media\img\pierogi-z-miesem.jpg" alt="pierogi" class="cover">
        <div class="description">
            <h1><?php echo $dish['Nazwa']; ?></h1>
        </div>
        <form action="./functions/cart/del_from_cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $dish['IDPotrawy']; ?>"> </input>  
            <input type="number" name="times" value="<?php echo $_SESSION['cart'][$dish['IDPotrawy']]; ?>"> 
            <button class="add" type="submit"><i class="fas fa-edit"></i></button>
        </form>
    </article>

<?php 
}
unset($db);

if (empty($_SESSION['cart'])) {
    echo "<h1> Koszyk pusty :( </h1>";
} else {
?>


<form action="checkout.php">
    <button type="submit"> Przejdz dalej </button>
</form>

<?php } include('../footer.php');  ?>