<?php
if (!defined('DB_SERVERNAME')) {
    define('DB_SERVERNAME', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'pasibrzuch');
}

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
        $query = "SELECT * FROM potrawy WHERE IDKategoria = {$id};";
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
    public function login($email, $password) {
        $query = "SELECT * FROM `Konta` WHERE `email` = '{$email}' AND `haslo` = '{$password}';";
        $result = mysqli_query($this->con, $query);
        if (!$result) return NULL;
        $row = $result->fetch_assoc();
        if (mysqli_num_rows($result)==0) return NULL;
        return array(
            "IDKlient" => $row["IDKlient"],
            "IDKonta" => $row["IDKonta"]
        );
    }
    

    #return

    public function createClient($nrTelefonu, $nazwaKlienta, $adres) {
        $query = "INSERT INTO `Klienci` (NrTelefonu, nazwaKlienta, adres) VALUES ('{$nrTelefonu}', '{$nazwaKlienta}', '{$adres}');";
        $result = mysqli_query($this->con, $query);
        if (!$result) return NULL;
        $query = "SELECT * FROM `Klienci` WHERE NrTelefonu = '{$nrTelefonu}' and NazwaKlienta = '{$nazwaKlienta}' LIMIT 1;";
        $result = mysqli_query($this->con, $query);
        $row = $result->fetch_assoc();
        return $row;

        # to do
        
    }


    public function createUser($email, $password, $nrTelefonu, $nazwaKlienta, $adres) {
        $query = "SELECT * FROM `Konta` WHERE Email = '{$email}';";
        $result = mysqli_query($this->con, $query);
        //echo var_dump($result);
        if (mysqli_num_rows($result)>0) return NULL;
        $client = $this->createClient($nrTelefonu, $nazwaKlienta, $adres);
        $query = "INSERT INTO `konta` (Email, Haslo, IDKlient) VALUES ('{$email}', '{$password}', {$client['IDKlient']});";
        $result = mysqli_query($this->con, $query);
        if (!$result) return NULL;
        
        # To do return ID Klienta oraz ID Usera
        return $result;
    }

    
    public function getUserByID($IDKonta) {
        $query = "SELECT * FROM `Konta` WHERE `IDKonta` = '{$IDKonta}';";
        $result = mysqli_query($this->con, $query);
        $row = $result->fetch_assoc();
        if (mysqli_num_rows($result)==0) return NULL;
        return $row;
    }

    public function getClientByID($IDKlient) {
        $query = "SELECT * FROM `Klienci` WHERE `IDKlient` = '{$IDKlient}';";
        $result = mysqli_query($this->con, $query);
        $row = $result->fetch_assoc();
        if (mysqli_num_rows($result)==0) return NULL;
        return $row;
    }

}







?>