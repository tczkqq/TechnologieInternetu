<?php 
require ('../imports.php');
require ('../header.php');
include ('partials/cart-preview.php');
?>



<?php if (!isset($_SESSION['user'])) {

?>
<section class="acc">
    <?php include('partials/login.php') ?>


    <?php include('partials/register.php') ?>
</section>
<?php 
}
?>

<section class="no-acc">
    <h1>Zamówienie 
    <?php 
        if (!isset($_SESSION['user'])) 
            echo "bez konta";
    ?>
    </h1>
    <form action="./functions/cart/make_order.php" method="post">
        <input type="text" name="nazwa" placeholder="Imie i nazwisko" 
        <?php if (!is_null($client)) {
            echo 'value="'. $client["NazwaKlienta"] . '"';} 
        ?>> </input>
        <input type="tel" name="telefon" placeholder="Numer telefonu" 
        <?php if (!is_null($client)) {
            echo 'value="'. $client["NrTelefonu"] . '"';} 
        ?>> </input>
        <input type="text" name="adres" placeholder="Adres"
        <?php if (!is_null($client)) {
            echo 'value="'. $client["Adres"] . '"';} 
        ?>> </input>
        <?php if (isset($_SESSION['user'])) { ?>
            <input type="datetime-local" name="data"></input>
        <?php } ?>
        
        <button type="submit">Zamów</button>
    </form>
</section>





<?php
include('../footer.php');
?>