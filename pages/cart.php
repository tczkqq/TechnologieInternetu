
<?php 
require ('../header.php');
require ('./functions/database.php');

$db = new DbHandler();

foreach ($_SESSION['cart'] as $item) {
    $dish = $db->getDishById ($item);
    ?>


<article class="product">
    <img src="..\media\img\pierogi-z-miesem.jpg" alt="pierogi" class="cover">
    <div class="description">
        <h1><?php echo $dish['Nazwa']; ?></h1>
    </div>
    <form action="./functions/del_from_cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $dish['IDPotrawy']; ?>"> </input>  
        <input type="number" name="times" value="0"> 
        <button class="add" type="submit">Zamów</button>
    </form>
</article>




<?php 
}
unset($db);
include('../footer.php'); 
?>