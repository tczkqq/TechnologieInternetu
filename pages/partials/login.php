<section class="login">
    <h2>Zaloguj się</h2>
    <form action="./functions/accounts/login.php" method="post">
        <p>
            <label for="logemail">Login:</label>
                <input type="email" name="email" id="logemail" placeholder="Adres email" required> </input>
        </p>
        <p>
            <label for="logpassword">Hasło:</label>
                <input type="password" name="password" id="logpassword" placeholder="Hasło" required> </input>
        </p>    
        <button type="submit" class="bbtn">Zaloguj</button>
    </form>
</section>    