<?php 
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/jwt.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_FILES["profile"]) && isset($_POST['token'])) {
        $token  = htmlspecialchars($_POST['token']);
        $id     = htmlspecialchars($_POST['id']);
        $secret_key = bearer();
        try {
            $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
            $uploaded_file = $_FILES["profile"];
            $image_path    = Profile($uploaded_file, $id);
            if ($image_path) {
                $response = array(
                    'status'    => 'success',
                    'data'      => ["method" => "POST","image_link" => base_url().$image_path]
                );
            } else {
                $response = ['status' => 'error','message' => 'Format gambar tidak diizinkan!'];
            }
        } catch (\Throwable $e) {
            $response = ['status' => 'error','message' => 'Expired Session!'];
        }
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error','data' => ['method' => 'POST','message' => 'Token required or invalid method!']]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id']) && isset($_GET['token'])) {
        $token  = htmlspecialchars($_GET['token']);
        $id     = htmlspecialchars($_GET['id']);
        $secret_key = bearer();
        try {
            $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
            if (GetData($id)->num_rows > 0) {
                $response = [
                    'status'    => 'success',
                    'data'      => base_url().GetData($id)->fetch_object()->profile
                ];
            }

        } catch (\Throwable $e) {
            http_response_code(400);
            $response = ['status' => 'error','message' => 'Expired Session!'];
        }
    } else {
        echo json_encode(['status' => 'error','data' => ['method' => 'GET','message' => 'Token required or invalid method!']]);
    }
    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error','message' => 'Token required or invalid method!']);
}

?>