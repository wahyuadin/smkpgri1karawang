<?php
$hostname   = 'localhost';
$database   = 'id21759258_token';
$username   = 'id21759258_token';
$password   =  'Netsian2.0';

// $hostname   = 'localhost';
// $database   = 'api';
// $username   = 'root';
// $password   =  '';

$conn = mysqli_connect($hostname, $username, $password, $database);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = array('message' => 'response.');
    echo json_encode($data);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_data = json_decode(file_get_contents("php://input"), true);
    if (isset($input_data['name'])) {
        $name = $input_data['name'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM token WHERE token='$name'")) >= 1) {
            $response = array('status' => 'true','message' => 'token is valid !');
            echo json_encode($response);
        } else {
            http_response_code(400);
            echo json_encode(array('status' => 'error', 'message' => 'invalid Token'));
        }
    } else {
        http_response_code(400);
        echo json_encode(array('error' => 'invalid token.'));
    }
} else {
    http_response_code(405);
    echo json_encode(array('error' => 'true.'));
}

// ...



?>
