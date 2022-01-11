<?php 
require ('../imports.php');
echo '<link rel="stylesheet" href="../static/css/checkout.css">';
require ('../header.php');
require ('./functions/database.php');


if (isset($_SESSION['user']) and $_SESSION['is_admin']) {
    $db = new DbHandler();

    $client = $db -> getClientByID($_GET['id']);
    $history = $db -> getOrdersByClientID($_GET['id']);
?>
<section class="profile">
    <h2>Klient nr.<?= $client['IDKlient']; ?></h2>
    <p> Imie i nazwisko: <?= $client['NazwaKlienta']; ?></p>
    <p> Numer Telefonu: <?= $client['NrTelefonu']; ?></p>
    <p> Adres: <?= $client['Adres'] ;?></p>
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
    include('../footer.php');
} else {header('Location: main.php' );} ?>