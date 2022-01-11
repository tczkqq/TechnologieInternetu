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
                <?php echo $_SESSION['cart'][$dish['IDPotrawy']]; ?>x
                <?php echo $dish['Nazwa']; ?> </br>
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