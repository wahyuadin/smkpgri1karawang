<?php 
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/jwt.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['token'])) {
    $token = htmlspecialchars($_POST['token']);
    $secret_key = bearer();
    try {
        JWT::decode($token, new Key($secret_key, 'HS256'));
        $response = ['status'    => 'success','message' => 'Token Accept'];
    } catch (\Throwable $e) {
        $response = ['status' => 'error','message' => 'Expired Session!'];
    }
    echo json_encode($response);
}
?>