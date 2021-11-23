<?php

session_start();

$_SESSION['test'] = "test";

header("Location: pages/koktajle.php");
exit();


?>