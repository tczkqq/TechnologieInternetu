<?php

session_start();
# Inicjalizacja zmiennych
if (!(isset($_SESSION['init'])) or $_SESSION['init'] === false) {
    $_SESSION['cart'] = array();
    $_SESSION['is_admin'] = false;
    $_SESSION['init'] = true;    
    $_SESSION['user'] = NULL;
};

?>