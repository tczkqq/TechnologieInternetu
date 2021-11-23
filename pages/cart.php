<form action="./functions/add_to_cart.php" method="post">

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
</article>



<?php 
}
unset($db);
include('../footer.php'); 
?>
</form>