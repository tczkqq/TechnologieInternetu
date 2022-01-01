<section class="summary">
    <h2>Podsumowanie</h2>
    <?php
    require_once ('./functions/database.php');

    $dba = new DbHandler();

    foreach ($_SESSION['cart'] as $key => $item) {
        $dish = $dba->getDishById ($key);
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
        $client = $dba -> getClientByID($_SESSION["user"]["IDKlient"]);
    }
   
    unset($dba);
    ?>
</section>