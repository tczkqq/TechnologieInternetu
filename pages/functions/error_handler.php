<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/error.css">
    <title>Błąd !</title>
</head>
<body>
    
<h1>Błąd!</h1>
<h2><?php echo $_COOKIE['errormsg']; ?></h2>
Za chwile nastąpi przekierowanie...
<?php

#header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
<script>
    function sleep (time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }
    sleep(3000).then(() => {
        history.back()
    });
    
</script>

</body>
</html>