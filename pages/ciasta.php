<?php 
require ('./functions/database.php');
$db = new DbHandler();


require ('../imports.php');
echo '<link rel="stylesheet" href="../static/css/menu.css">';
require ('../header.php');
require ('partials/menu_nav.php');

$dishes = $db->getDishesByCategory(4);
foreach ($dishes as $dish) {

?>


<article class="product">
    <img src="..\media\img\<?php echo $dish['Okladka']; ?>" alt="pierogi" class="cover">
    <div class="description">
        <h1><?php echo $dish['Nazwa']; ?></h1>
        <p><?php echo $dish['Opis']; ?></p>
    </div>

        <form action="./functions/cart/add_to_cart.php" method="post" class="add">
        <div class="inp">
            <input type="hidden" name="product_id" value="<?php echo $dish['IDPotrawy']; ?>"> </input>  
            <a> <i class="fas fa-plus" class="deladd"></i> </a>
            <input type="number" name="times" value="0" class="amount"> 
            <a> <i class="fas fa-minus" class="deladd"></i> </a>
        </div>
        <a type="submit" class="addToCart"><i class="fas fa-cart-plus"></i></a>
    </form>
    
</article>


<?php 
}
include('../footer.php'); 
?>