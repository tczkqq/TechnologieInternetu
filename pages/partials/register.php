<div class="register">
    <h2> Nie masz konta? Zarejestruj się </h2>
    <form action="./functions/accounts/register.php" method="post">
        <p>
            <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Adres email"> </input> 
        </p>
        <p>
            <label for="password">Hasło:</label>
                <input type="password" id="password" name="password" placeholder="Hasło"> </input> 
        </p>
        <p>
            <label for="rpassword">Powtórz hasło:</label>
                <input type="password" id="rpassword" name="passwordconfirm" placeholder="Powtórz hasło"> </input> 
        </p>
        <p>
            <label for="nazwa">Imie i nazwisko</label>
                <input type="text" id="nazwa" name="nazwa" placeholder="Imie i nazwisko"> </input> 
        </p>
        <p>
            <label for="tel">Nr. Telefonu</label>
                <input type="tel" id="tel" name="telefon" placeholder="Numer telefonu "></input> 
        </p>
        <p>
            <label for="adres">Adres</label>
                <input type="text" id="adres" name="adres" placeholder="Adres"> </input> 
        </p>
            <button type="submit" class="bbtn">Zarejestruj</button>
    </form>
</div>