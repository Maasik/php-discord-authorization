<?php

session_start();

if(!$_SESSION["logged_in"]) {
    header("Location: /login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ("./includes/head.php"); ?>
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <p class="welcome">Добро пожаловать, <?php echo $_SESSION['user']['username'].'#'.$_SESSION['user']['discriminator'] ?></p>
    </div>

</body>
</html>