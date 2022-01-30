<?php
require ('../functions/database.php');
$db = new DbHandler();
if (isset($_GET['name']))
    $s = $_GET['name'];
else 
    $s = '';

$clients = $db->searchClientsByName($s);
?>
<th>IdKlienta </th>
<th>Nazwa Klienta </th>
<th>Adres </th>
<th>Nr.Telefonu </th>
        
<?php
foreach ($clients as $client) {
    echo "<tr><td>{$client['IDKlient']}</td>";
    echo "<td>{$client['NazwaKlienta']}</td>";
    echo "<td>{$client['Adres']}</td>";
    echo "<td>{$client['NrTelefonu']}</td></tr>";
}
?>