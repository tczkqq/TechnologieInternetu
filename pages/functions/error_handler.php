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
<div class="wrapper">
    <h1> Błąd!</h1>
    <h2><?php echo $_COOKIE['errormsg']; ?></h2>
    <h4 id="redirect-text"> Za chwile nastąpi przekierowanie... </h4> </br>
    <script>
        function sleep (time) {
            return new Promise((resolve) => setTimeout(resolve, time));
        }
        sleep(3000).then(() => {
            history.back()
        });
        
    </script>


    <img src="../../static/img/logo.png" alt="logo" >

</div>
</body>
</html>