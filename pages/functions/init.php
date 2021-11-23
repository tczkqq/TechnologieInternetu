<?php

#session_destroy();
# Inicjalizacja zmiennych
if (!(isset($_SESSION['init'])) or $_SESSION['init']== false) {
    echo "INIT SESJI";
    session_start();

    $_SESSION['cart'] = array();
    $_SESSION['is_admin'] = true;
    $_SESSION['init'] = true;
    
}



?>