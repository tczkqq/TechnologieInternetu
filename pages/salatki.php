<?php 
require ('./functions/database.php');
$db = new DbHandler();


require ('../header.php');
require ('templates/menu_nav.php');

$dishes = $db->getDishesByCategory(3);
foreach ($dishes as $dish) {

?>


<article class="product">
    <img src="..\media\img\<?php echo $dish['Okladka']; ?>" alt="pierogi" class="cover">
    <div class="description">
        <h1><?php echo $dish['Nazwa']; ?></h1>
        <p><?php echo $dish['Opis']; ?></p>
    </div>

    <form action="./functions/cart/add_to_cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $dish['IDPotrawy']; ?>"> </input>  
        <input type="number" name="times" value="0"> 
        <button class="add" type="submit">Zamów</button>
    </form>
    
</article>


<?php 
}
include('../footer.php'); 
?>