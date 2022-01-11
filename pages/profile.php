<?php 
require ('../imports.php');
echo '<link rel="stylesheet" href="../static/css/checkout.css">';
require ('../header.php');
require ('./functions/database.php');



#echo '<pre>' . var_export($history, true) . '</pre>';
?>

<?php if (!isset($_SESSION['user'])) { ?>

<h1>Niezalogowany</h1>
<div class="rows">
<?php include('partials/register.php'); ?>
<?php include('partials/login.php'); ?>
</div>


<?php 
} else { 
    $db = new DbHandler();
    $client = $db -> getClientByID($_SESSION['user']['IDKlient']);
    $user = $db -> getUserByID($_SESSION['user']['IDKonta']);
    $history = $db -> getOrdersByClientID($_SESSION['user']['IDKlient']);
?>

<!-- Po lewej jakies foto -->
<section class="profile">
    <h2>Witaj <?= $client['NazwaKlienta']; ?>!</h2>
    <p> Imie i nazwisko: <?= $client['NazwaKlienta']; ?></p>
    <p> Mail: <?= $user['Email']; ?></p>
    <p> Numer Telefonu: <?= $client['NrTelefonu']; ?></p>
    <p> Adres: <?= $client['Adres'] ;?></p>
    <a href="functions/logout.php" class="bbtn">Wyloguj</a>
</section>

<section class="history">
    <h2>Historia Zamowień</h2>
    
    <?php if (isset($history)) { ?>
        
        <table>
        <tr> 
            <th> Data Zamowienia </th>
            <th> Adres dostawy </th>
            <th> Wybrana data dostawy </th>
            <th> Koszyk </th>
        </tr>
    <?php
        foreach ($history as $order) { 
            echo "<tr>";
            echo "<td>".$order['DataZamowienia']."</td>";
            echo "<td>".$order['MiejsceDostawy']."</td>";
            if (isset($order['DataDostawy']))
                echo "<td>".$order['DataDostawy']."</td>";
            else 
                echo "<td></td>";
            echo "<td>?</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else echo "Brak zamówien :/";?>
    
</section>
<?php
}
include('../footer.php');
?>