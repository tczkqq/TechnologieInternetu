</head>

<body>
    <?php  
    require_once('pages/functions/init.php');
    if ($_SESSION['is_admin']) {
        echo "Cart : ";
        echo var_dump($_SESSION['cart']). "<br>"; 
        echo "Logged: ";
        echo var_dump(isset($_SESSION['user'])); 
        echo var_dump($_SESSION['user']); 
        echo '<form action="./functions/logout.php"> <input type="submit" value="Wyczyść sesje"> </form>';
    }
    ?>
    <div class="layout">
        <header class="header">
            <a href="../pages/main.php"> <img src="../static/img/logo.png" alt="kucharz" id="logo"></a>
            <span id="page-title">Pasibrzuch - Szybko, tanio i smacznie</span>
            <div class="user-panel">
                <?php if (isset($_SESSION['is_admin']) and $_SESSION['is_admin'] == true) { ?>
                    <a href="admin.php"><i class="fas fa-book"></i></a>
                    <?php }; ?>
                    <a href="profile.php"><i class="fas fa-user-circle"></i></a>
                    <div id="cart">
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i>
                    <?php
                    $much = 0;
                    if (count($_SESSION['cart'])>0) {
                        foreach($_SESSION['cart'] as $item) {
                            $much += $item;
                        }
                        echo "(" . $much . ")";
                    }
                    ?>
                    </a>
                </div>
            </div>
        </header>
        <main class="wrapper">