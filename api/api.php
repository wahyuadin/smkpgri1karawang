<?php

$hostname   = 'localhost';
$database   = 'id21759258_token';
$username   = 'id21759258_token';
$password   =  'Netsian2.0';

// $hostname = 'localhost';
// $database = 'db_tanaman';
// $username = 'root';
// $password = '';



header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$conn = mysqli_connect($hostname, $username, $password, $database);
$api_token = "3c9d6f412019a23d7be9dd7ada99bba623fa05e84be22151941808411fcd";

$headers = apache_request_headers();
$token = isset($headers['Authorization']) ? $headers['Authorization'] : '';
if ($token !== "Bearer $api_token") {
    http_response_code(401);
    $response = array(
        'status' => 'error',
        'message' => 'Unauthorized Token'
    );
    echo json_encode($response);
    exit;
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            if (empty($data['kelembapan']) || empty($data['humidity']) || empty($data['temperature']) || empty($data['status']) || empty($data['value'])) {
                http_response_code(400);
                $response = array(
                    'status' => 'error',
                    'message' => 'gagal input data'
                );
                echo json_encode($response);
                exit;
            } else {
                $kelembapan     = $data['kelembapan'];
                $humidity       = $data['humidity'];
                $temperature    = $data['temperature'];
                $status         = $data['status'];
                $value          = $data['value'];
                if (mysqli_query($conn, "INSERT INTO monitor (kelembapan, humadity, temperatur, status, value)
                VALUES ('$kelembapan', '$humidity', '$temperature', '$status', '$value')")) {
                    $response = array(
                        'status'        => 'success',
                        'method'        => 'POST',
                        'data'          => [
                            'kelembapan'    => $data['kelembapan'],
                            'humidity'      => $data['humidity'],
                            'temperature'   => $data['temperature'],
                            'status'        => $data['status'],
                            'value'        => $data['value'],
                        ],
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'querry error '.mysqli_error($conn)
                    );
                    echo json_encode($response);
                }
            }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $queryResult = mysqli_query($conn, "SELECT * FROM monitor");
        if ($queryResult) {
            $responseData = array();
            while ($data = mysqli_fetch_assoc($queryResult)) {
                $responseData[] = $data;
            }
            $response = array(
                'status' => 'success',
                'method' => 'GET',
                'data' => $responseData
            );
        
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'querry error '.mysqli_error($conn)
            );
            echo json_encode($response);
        }
    }
    else {
        $response = array(
            'status' => 'error',
            'message' => 'Invalid method'
        );
        echo json_encode($response);
        exit();
    }
}
?>
