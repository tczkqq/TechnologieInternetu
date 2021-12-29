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
    <h1>Szybkie zamówienie 
    <?php if (!isset($_SESSION['user'])) { ?> 
        bez konta</h1>
    <?php } ?>
    <form action="./functions/make_order.php" method="post">
        <input type="text" name="nazwa" placeholder="Imie i nazwisko" <?php if (isset($_SESSION['client'])) {echo 'value="{$_SESSION[\'client\']}"';} ?>> </input>
        <input type="tel" name="telefon" placeholder="Numer telefonu" <?php if (isset($_SESSION['client'])) {echo 'value="{$_SESSION[\'client\']}"';} ?>> </input>
        <input type="text" name="adres" placeholder="Adres"> </input>
        <button type="submit">Zamów</button>
    </form>
</section>





<?php
include('../footer.php');
?>