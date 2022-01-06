<?php
require ('../imports.php');
require ('../header.php');
require ('./functions/database.php');

if (isset($_SESSION['user']) and $_SESSION['is_admin']) {
    $db = new DbHandler();
    $history = $db -> getOrders();
?>


<h2>Wyszukaj klienta</h2>
<form>
    <input type="text">
</form>



<h2>Zamowienia</h2>
<table>
<th> Id klienta </th>
<th> Id zamowienia </th>
<th> Miejsce Dostawy </th>
<th> Data Zamowienia </th>
<th> Data Dostawy </th>
<?php
        foreach ($history as $order) { 
            echo "<tr>";
            echo "<td><a href=\"client_detail.php?id={$order['IDKlienta']}\">".$order['IDKlienta']."</td>";
            echo "<td>".$order['IDZamowienia']."</td>";
            echo "<td>".$order['MiejsceDostawy']."</td>";
            echo "<td>".$order['DataZamowienia']."</td>";
            if (isset($order['DataDostawy']))
                echo "<td>".$order['DataDostawy']."</td>";
            else 
                echo "<td></td>";
            echo "</tr>";
            
        };?>
</table>





<?php 

include('../footer.php');
} else {
    header('Location: main.php' );
}
?>