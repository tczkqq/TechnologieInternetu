<?php 
require ('../header.php');
require ('./functions/database.php');
?>

<section class="summary">
    <h2>Podsumowanie</h2>
    <?php
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

<?php if (!isset($_SESSION['user'])) {

?>
<section class="acc">
    <div class="login">
        <h2>Zaloguj się</h2>
        <form action="./functions/accounts/login.php" method="post">
                <input type="email" name="email" placeholder="Adres email"> </input>
                <input type="password" name="password" placeholder="Hasło"> </input>
                <button type="submit">Zaloguj</button>
        </form>
    </div>    


    <div class="register">
        <h2> Nie masz konta? Zarejestruj się </h2>
        <form action="./functions/accounts/register.php" method="post">
                <input type="email" name="email" placeholder="Adres email"> </input>
                <input type="password" name="password" placeholder="Hasło"> </input>
                <input type="password" name="passwordconfirm" placeholder="Powtórz hasło"> </input>
                <input type="text" name="nazwa" placeholder="Imie i nazwisko"> </input>
                <input type="tel" name="telefon" placeholder="Numer telefonu "></input>
                <input type="text" name="adres" placeholder="Adres"> </input>
                <button type="submit">Zarejestruj</button>
        </form>
    </div>
</section>
<?php 
}
?>

<section class="no-acc">
    <h1>Zamówienie 
    <?php if (!isset($_SESSION['user'])) { ?> 
        bez konta</h1>
    <?php }  ?>
    <form action="./functions/make_order.php" method="post">
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
        <button type="submit">Zamów</button>
    </form>
</section>





<?php
include('../footer.php');
?>