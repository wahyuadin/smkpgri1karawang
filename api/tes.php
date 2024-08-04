<?php

if (isset($_POST['login'])) {
    $data = array(
        'username' => $_POST['username'],
        'password' => $_POST['password']
    );
    $url = 'localhost/api/api-login.php';
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded'
    );
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    if (json_decode($response)->status == 'error') {
        echo "<script>alert('".json_decode($response)->message."')</script>";
    } else {
        return var_dump($response);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">username</label>
        <input type="text" name="username"><br>
        <label for="">password</label>
        <input type="password" name="password">
        <button name="login">Login</button>
    </form>
</body>
</html>
