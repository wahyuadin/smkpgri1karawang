<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/jwt.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_POST['token'])) {
    $token = htmlspecialchars($_POST['token']);
    $secret_key = bearer();
    try {
        $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
        $url = 'https://initiatory-equation.000webhostapp.com/api/api.php';
        $bearer = '3c9d6f412019a23d7be9dd7ada99bba623fa05e84be22151941808411fcd';
        $options = ['http' => ['header'  => "Authorization: Bearer $bearer",'method'  => 'GET']];
        $context  = stream_context_create($options);
        $response = json_decode(file_get_contents($url, false, $context));
    } catch (\Throwable $e) {
        $response = ['status' => 'error','message' => 'Expired Session!'];
    }
    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error','message' => 'Token required or invalid method!']);
}

?>

