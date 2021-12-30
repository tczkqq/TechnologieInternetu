<?php 
require ('../header.php');
require ('./functions/database.php');
?>

<?php if (!isset($_SESSION['user'])) { ?>

<h1>Niezalogowany</h1>
<?php include('partials/login.php') ?>
<?php include('partials/register.php') ?>



<?php } else { ?>

<h1> Zalogowany</h1>


<?php
}
include('../footer.php');
?>