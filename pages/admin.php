<?php
require ('../imports.php');
echo '<link rel="stylesheet" href="../static/css/checkout.css">';
require ('../header.php');
require ('./functions/database.php');

if (isset($_SESSION['user']) and $_SESSION['is_admin']) {
    $db = new DbHandler();
    $history = $db -> getOrders();
?>



<section class="fullwidth">
    <h2>Wyszukaj klienta</h2>
    <form>
        <input type="text" placeholder="Szukaj po nazwie klienta" onkeyup="showHint(this.value)">
    </form>
    <table id="clients">
        
    </table>
</section>



<h2 style="text-align:center;">Zamowienia</h2>
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



<script>
    function showHint(str) {
    if (str.length == 0) {
        document.getElementById("clients").innerHTML = '';
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("clients").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "partials/clients.php?name=" + str, true);
        xmlhttp.send();
    }
}
</script>

<?php 

include('../footer.php');
} else {
    header('Location: main.php' );
}
?>