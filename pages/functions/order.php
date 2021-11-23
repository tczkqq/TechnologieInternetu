<?php

require_once ('../config.php');

$conn = new mysqli($db_servername, $db_username, $db_password);

if ($conn->connect_error) {
  die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

$sql = "";
header("location:javascript://history.go(-1)");


?>