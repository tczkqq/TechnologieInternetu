<?php

session_start();


// echo date('Y-m-d h:i:s a', time());
// echo "</br>";
// echo date('Y-m-d h:i:s a', strtotime($_POST['data']));

$var1 = date('Y-m-d h:i:s a', time());
$var2 = date('Y-m-d h:i:s a', strtotime($_POST['data']));


$var1 = strtotime($var1);
$var2 = strtotime($var2);


$diff = ($var1 - $var2) / ( 60 * 60 );
echo $diff;

echo "<br>";
    if ($diff > -1) {
        echo "błąd";
    } else {
        echo "niecblad";
    }





?>