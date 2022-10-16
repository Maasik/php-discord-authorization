<?php

include(__DIR__.'/config.php');

$discord_url = "https://discord.com";

session_start();

if(isset($_GET["code"])){
    $ch = curl_init($discord_url."/api/oauth2/token");

    $data = [
        'client_id'=>CLIENT_ID,
        'client_secret'=>CLIENT_SECRET,
        'grant_type'=>'authorization_code',
        'code'=>$_GET['code'],
        'redirect_uri'=>LOGIN_URL,
    ];

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    $result = json_decode($result,true);

    $access_token = $result["access_token"];

    $headers = array(
        "Authorization: Bearer ".$access_token,
        "Content-Type: application/json",
        "Accept: application/json",
    );

    $ch = curl_init($discord_url."/api/users/@me");

    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    $result = json_decode($result,true);

    $_SESSION["logged_in"] = true;
    $_SESSION["user"] = [
        "id"=>$result['id'],
        "username"=>$result['username'],
        "avatar"=>$result["avatar"],
        "discriminator"=>$result["discriminator"],
        "access_token"=>$access_token,
    ];

    header("Location: /dashboard.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ("./includes/head.php"); ?>
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <button class="btn btn-login" onclick="redirect_to_oauth()"><span>Войти с помощью Discord</span></button>
    </div>

    <script>
        function redirect_to_oauth() {
            window.location = "<?php echo REDIRECT_URI; ?>"
        }
    </script>
</body>
</html>