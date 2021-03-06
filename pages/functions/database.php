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
            "IDKonta" => $row["IDKonta"],
            "Typ" => $row["Typ"]
        );
    }


    public function createClient($nrTelefonu, $nazwaKlienta, $adres) {
        $query = "INSERT INTO `Klienci` (NrTelefonu, nazwaKlienta, adres) VALUES ('{$nrTelefonu}', '{$nazwaKlienta}', '{$adres}');";
        $result = mysqli_query($this->con, $query);
        if (!$result) return NULL;
        $query = "SELECT * FROM `Klienci` WHERE NrTelefonu = '{$nrTelefonu}' and NazwaKlienta = '{$nazwaKlienta}' LIMIT 1;";
        $result = mysqli_query($this->con, $query);
        $row = $result->fetch_assoc();
        return $row;
    }


    public function createUser($email, $password, $nrTelefonu, $nazwaKlienta, $adres) {
        $query = "SELECT * FROM `Konta` WHERE Email = '{$email}';";
        $result = mysqli_query($this->con, $query);
        
        if (mysqli_num_rows($result)>0) return NULL;
        $client = $this->createClient($nrTelefonu, $nazwaKlienta, $adres);
        $query = "INSERT INTO `konta` (Email, Haslo, IDKlient) VALUES ('{$email}', '{$password}', {$client['IDKlient']});";
        $result = mysqli_query($this->con, $query);
        if (!$result) return NULL;

        return $result;
    }

    
    public function getUserByID($IDKonta) {
        $query = "SELECT * FROM `Konta` WHERE `IDKonta` = '{$IDKonta}';";
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result)==0) return NULL;
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getClientByID($IDKlient) {
        $query = "SELECT * FROM `Klienci` WHERE `IDKlient` = '{$IDKlient}';";
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result)==0) return NULL;
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getOrderByID($IDZamowienia) {
        $query = "SELECT * FROM `zamowienia` WHERE `IDZamowienia` = '{$IDZamowienia}';";
        $result = mysqli_query($this->con, $query);
        $row = $result->fetch_assoc();
        if (mysqli_num_rows($result)==0) return NULL;
        return $row;
    }

    public function getCartByOrderID($IDZamowienia) {
        $query = "SELECT * FROM `zamowione_potrawy` WHERE `IDZamowienia` = '{$IDZamowienia}';";
        $result = mysqli_query($this->con, $query);
        $items = array();
        while ($row = $result->fetch_assoc()) {
                $items[$row["IDZamowienia"]]["IDZamowienia"] = $row["IDZamowienia"];
                $items[$row["IDZamowienia"]]["IDPotrawy"] = $row["IDPotrawy"];
                $items[$row["IDZamowienia"]]["Ilosci"] = $row["Ilosci"];               
        };

        if (mysqli_num_rows($result)==0) return NULL;
        return $items; 
    }

    public function getOrdersByClientID($IDKlienta) {
        $query = "SELECT * FROM `zamowienia` WHERE `IDKlienta` = '{$IDKlienta}';";
        $result = mysqli_query($this->con, $query);
        $items = array();
        while ($row = $result->fetch_assoc()) {
                $items[$row["IDZamowienia"]]["IDZamowienia"] = $row["IDZamowienia"];
                $items[$row["IDZamowienia"]]["MiejsceDostawy"] = $row["MiejsceDostawy"];
                $items[$row["IDZamowienia"]]["DataZamowienia"] = $row["DataZamowienia"];
                if (isset($row["DataDostawy"]))
                    $items[$row["IDZamowienia"]]["DataDostawy"] = $row["DataDostawy"];
        };

        if (mysqli_num_rows($result)==0) return NULL;
        return $items; 
    }

    public function getOrders() {
        $query = "SELECT * FROM `zamowienia`;";
        $result = mysqli_query($this->con, $query);
        $items = array();
        while ($row = $result->fetch_assoc()) {
                $items[$row["IDZamowienia"]]["IDZamowienia"] = $row["IDZamowienia"];
                $items[$row["IDZamowienia"]]["MiejsceDostawy"] = $row["MiejsceDostawy"];
                $items[$row["IDZamowienia"]]["DataZamowienia"] = $row["DataZamowienia"];
                if (isset($row["DataDostawy"]))
                    $items[$row["IDZamowienia"]]["DataDostawy"] = $row["DataDostawy"];
                $items[$row["IDZamowienia"]]["IDKlienta"] = $row["IDKlienta"];
        };

        if (mysqli_num_rows($result)==0) return NULL;
        return $items; 
    }

    public function makeOrder($cart, $user) {
        if (array_key_exists('IDKlient', $user)) {
            $query = "INSERT INTO `zamowienia` (`IDKlienta`, `MiejsceDostawy`, `DataZamowienia`, `DataDostawy`)
                         VALUES ('{$user['IDKlient']}', '{$user['adres']}', NOW(), {$user['DataDostawy']});";
            $client = $user['IDKlient'];
        } else {
            $client = $this -> createClient($user['telefon'], $user['nazwa'], $user['adres']);
            $query = "INSERT INTO `zamowienia` (`IDKlienta`, `MiejsceDostawy`, `DataZamowienia`) VALUES ('{$client['IDKlient']}', '{$user['adres']}', NOW());";
        }

        $result = mysqli_query($this->con, $query);
        if (!$result) return NULL;

        $query = "SELECT LAST_INSERT_ID();";
        $result = mysqli_query($this->con, $query);
        if (!$result) return NULL;
        $row = $result->fetch_assoc();
        $order = $row["LAST_INSERT_ID()"];

        $query = "";
        foreach ($_SESSION['cart'] as $key => $item) {
            $dish = $this -> getDishById ($key);
            $query .= "INSERT INTO `zamowione_potrawy` (`IDZamowienia`, `IDPotrawy`, `Ilosci`)
                    VALUES ('{$order}','{$key}','{$item}'); ";
        }
        $result = mysqli_multi_query($this->con, $query);
        if (!$result) return NULL;

        return $order;
    }

    public function searchClientsByName($name) {
        $query = "SELECT * FROM `klienci` WHERE `nazwaklienta` like '{$name}%';";
        $result = mysqli_query($this->con, $query);
        $items = array();
        while ($row = $result->fetch_assoc()) {
                $items[$row["IDKlient"]]["IDKlient"] = $row["IDKlient"];
                $items[$row["IDKlient"]]["NazwaKlienta"] = $row["NazwaKlienta"];
                $items[$row["IDKlient"]]["NrTelefonu"] = $row["NrTelefonu"];
                $items[$row["IDKlient"]]["Adres"] = $row["Adres"];
        };

        return $items;
    }

}



?>