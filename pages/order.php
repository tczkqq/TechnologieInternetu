<?php 
require ('../imports.php');
require ('../header.php');
?>

<form action="welcome.php" method="post">
    Imię: <input type="text" name="name" required><br>
    Telefon: <input type="tel" name="phone" pattern="^[0-9-+\s()]*$" required><br>
    Miejsce dostawy: <input type="text" name="phone"><br>
    Data Dostawy: <input type="datetime-local" name="phone"><br>
    <input type="submit">
</form>



<?php include('../footer.php'); ?>