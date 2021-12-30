<section class="summary">
    <h2>Podsumowanie</h2>
    <?php
    require ('./functions/database.php');
    $db = new DbHandler();

    foreach ($_SESSION['cart'] as $key => $item) {
        $dish = $db->getDishById ($key);
    ?>

    <article class="product">
        <div class="description">
            <h1>
                <?php echo $dish['Nazwa']; ?>
                (<?php echo $_SESSION['cart'][$dish['IDPotrawy']]; ?>)
                
            </h1>
        </div>

    </article>

    <?php 
    }
    $client = NULL;
    if (!is_null($_SESSION["user"])) {
        $client = $db -> getClientByID($_SESSION["user"]["IDKlient"]);
        echo var_dump($client);
    }
   
    unset($db);
    ?>
</section>