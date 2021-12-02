<?php 
require ('../header.php');
require ('./functions/database.php');
?>

<section class="summary">
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


<section class="no-acc">
<h1>Szybkie zamówienie bez konta</h1>
    <form action="./functions/make_order.php" method="post">
        <input type="text" placeholder="Imie i nazwisko"> </input>
        <input type="tel" placeholder="Numer telefonu "></input>
        <input type="text" placeholder="Adres"> </input>
        <button type="submit">Zamów</button>
    </form>
</section>


<section class="acc">
    <div class="login">
        <h2>Zaloguj się</h2>
        <form action="./functions/login.php" method="post">
                <input type="email" placeholder="Adres email"> </input>
                <input type="password" placeholder="Hasło"> </input>
                <button type="submit">Zaloguj</button>
        </form>
    </div>    


    <div class="register">
        <h2> Nie masz konta? Zarejestruj się </h2>
        <form action="./functions/register.php" method="post">
                <input type="email" placeholder="Adres email"> </input>
                <input type="password" placeholder="Hasło"> </input>
                <input type="text" placeholder="Imie i nazwisko"> </input>
                <input type="tel" placeholder="Numer telefonu "></input>
                <input type="text" placeholder="Adres"> </input>
                <button type="submit">Zarejestruj</button>
        </form>
    </div>
</section>




<?php
include('../footer.php');
?>