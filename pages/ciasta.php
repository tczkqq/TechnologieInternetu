<?php 
require ('../header.php');
require ('templates/menu_nav.php');
?>


<article class="product">
    <img src="..\media\img\pierogi-z-miesem.jpg" alt="pierogi" class="cover">
    <div class="description">
        <h1>Pierogi</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias sequi quam molestias eligendi fuga
            blanditiis nihil nam porro quis doloremque ipsa numquam laborum soluta facilis voluptatum harum
            id, quibusdam maiores!</p>
    </div>

    <form action="./functions/add_to_cart.php" method="post">
        <input type="hidden" name="product_id" value="1"> </input>    
        <button class="add" type="submit">Zamów</button>
    </form>
    
</article>
<article class="product">
    <img src="..\media\img\pierogi-z-miesem.jpg" alt="pierogi" class="cover">
    <div class="description">
        <h1>Pierogi</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias sequi quam molestias eligendi fuga
            blanditiis nihil nam porro quis doloremque ipsa numquam laborum soluta facilis voluptatum harum
            id, quibusdam maiores!</p>
    </div>
    <button class="add">Zamów</button>
</article>
<article class="product">
    <img src="..\media\img\pierogi-z-miesem.jpg" alt="pierogi" class="cover">
    <div class="description">
        <h1>Pierogi</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias sequi quam molestias eligendi fuga
            blanditiis nihil nam porro quis doloremque ipsa numquam laborum soluta facilis voluptatum harum
            id, quibusdam maiores!</p>
    </div>
    <button class="add">Zamów</button>
</article>

<?php include('../footer.php'); ?>