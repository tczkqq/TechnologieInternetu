<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasibrzuch</title>
    <link rel="stylesheet" href="../static/css/base.css">
    <link rel="stylesheet" href="../static/css/menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
    <?php session_start(); echo var_dump($_SESSION['cart']); ?>
    <div class="layout">
        <header class="header">
            <a href="../pages/main.php"> <img src="../static/img/logo.png" alt="kucharz" id="logo"></a>
            <span id="page-title">Pasibrzuch - Szybko, tanio i smacznie</span>
            <div class="user-panel">
                <?php if (isset($_SESSION['is_admin']) and $_SESSION['is_admin'] == true) { ?>
                    <i class="fas fa-user-circle"></i>
                <?php }; ?>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                <?php
                if (count($_SESSION['cart'])>0) {
                    echo "(".count($_SESSION['cart']).")";
                }
                ?>
            </div>
        </header>
        <main class="wrapper">