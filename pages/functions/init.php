<?php

session_start();
# Inicjalizacja zmiennych
if (!(isset($_SESSION['init'])) or $_SESSION['init'] === false) {
    echo "INIT SESJI";
   

    $_SESSION['cart'] = array();
    $_SESSION['is_admin'] = true;
    $_SESSION['init'] = true;
    
};



?>