<?php
require_once('../config.php');


class DbHandler {
    private $con;

    function __construct() {
        $this->con = @mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Błąd połączenia z bazą danych: " . $this->con->connect_error);;
    }
    function __destruct() {
        mysqli_close($this->con);
    }

    // TO DO:
    // private function secureFromSQLInjection($query)  {
    // }

    public function getDishById($id) {
        $query = "SELECT * FROM potrawy WHERE IDPotrawy = ". $id;
        $result = mysqli_query($this->con, $query);
        return $result->fetch_assoc();
    }

    // 1-Zestaw Obiadowy, 2-Koktajl, 3-Sałatka, 4-ciasto
    public function getDishesByCategory($id) {
        $query = "SELECT * FROM potrawy WHERE IDKategoria = ". $id;
        $items = array();
        $result = mysqli_query($this->con, $query);
        while ($row = $result->fetch_assoc()) {
                $items[$row["IDPotrawy"]]["IDPotrawy"] = $row["IDPotrawy"];
                $items[$row["IDPotrawy"]]["Nazwa"] = $row["Nazwa"];
                $items[$row["IDPotrawy"]]["Cena"] = $row["Cena"];
                $items[$row["IDPotrawy"]]["Opis"] = $row["Opis"];
                $items[$row["IDPotrawy"]]["Okladka"] = $row["Okladka"];
        };
        return $items;
    }


}







?>