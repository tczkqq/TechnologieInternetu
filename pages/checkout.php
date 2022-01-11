<?php 
require ('../imports.php');
echo '<link rel="stylesheet" href="../static/css/checkout.css">';
require ('../header.php');
?>



<?php if (!isset($_SESSION['user'])) {

?>
<div class="rows">
    <?php include('partials/login.php') ?>


    <?php include('partials/register.php') ?>
</div>
    <?php 
    }
    echo '<div class="rows">';
    include ('partials/cart-preview.php');
    ?>

    <section class="no-acc">
        <h1>Zamówienie 
        <?php 
            if (!isset($_SESSION['user'])) 
                echo "bez konta";
        ?>
        </h1>
        <form action="./functions/cart/make_order.php" method="post">
            <p>
                <label for="name">Imie i nazwisko:</label>
                <input type="text" name="nazwa" id="name" placeholder="Imie i nazwisko" 
                <?php if (!is_null($client)) {
                    echo 'value="'. $client["NazwaKlienta"] . '"';} 
                ?>> </input>
            </p>
            <p>
                <label for="tel">Numer telefonu:</label>
                <input type="tel" name="tel" name="telefon" placeholder="Numer telefonu" 
                <?php if (!is_null($client)) {
                    echo 'value="'. $client["NrTelefonu"] . '"';} 
                ?>> </input>
            </p>
            <p>
                <label for="adres">Adres dostawy:</label>
                <input type="text" id="adres" name="adres" placeholder="Adres"
                <?php if (!is_null($client)) {
                    echo 'value="'. $client["Adres"] . '"';} 
                ?>> </input>
            </p>
            <?php if (isset($_SESSION['user'])) { ?>
                <p>
                    <label for="Data">Czas dostawy</label>
                    <input type="datetime-local" id="data" name="data"></input>
                </p>
            <?php } ?>
            
            <button type="submit" class="bbtn big">Zamów</button>
        </form>
    </section>
</div>





<?php
include('../footer.php');
?>