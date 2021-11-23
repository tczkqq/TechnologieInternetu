<?php
require_once('../config.php');

echo $_SESSION['init'];


class DbHandler {
    private $con;

    function __construct() {
        echo "stroy";
        $this->con = @mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Błąd połączenia z bazą danych: " . $this->con->connect_error);;
    }
    function __destruct() {
        mysqli_close($this->con);
        echo "destroy";
    }

    // TO DO:
    // private function secureFromSQLInjection($query)  {
    // }

    public function getDishById($id) {
        $query = "SELECT * FROM potrawy WHERE IDPotrawy = ". $id;
        $result = mysqli_query($this->con, $query);
        //echo "<br>".var_dump($result);
        return $result->fetch_assoc();

        //echo $r['Nazwa'];
    }


}







?>