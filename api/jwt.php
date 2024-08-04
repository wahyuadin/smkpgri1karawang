<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
$servername = "localhost";
$username_db = "id21759258_token";
$password_db = "Netsian2.0";
$database = "id21759258_token";

// $servername = "localhost";
// $username_db = "root";
// $password_db = "";
// $database = "db_tanaman";

$conn = new mysqli($servername, $username_db, $password_db, $database);


if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
header("Content-Type: application/json; charset=UTF-8");
$key = "jsadhjaajjhajshjyastdya";


function base_url() {
    $data = 'http://'.$_SERVER['HTTP_HOST'].'/api/';
    return $data;
}
function generateToken($user_id) {
    global $key;
    $payload = array(
        "user_id" => $user_id,
        "exp" => time() + (60 * 60)
    );
    return JWT::encode($payload, $key, 'HS256');
}

function bearer() {
    global $key;
    return $key;
}

function Profile($file, $id) {
    global $conn;
    $uploads_dir = 'uploads/';
    $tmp_name = $file['tmp_name'];
    $filename = basename($file['name']);
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png");
    if (in_array($file_extension, $allowed_extensions)) {
        $hashed_filename = hash('sha256', $filename . uniqid()) . '.' . $file_extension;
        $destination = $uploads_dir . $hashed_filename;
        $sql = "UPDATE `gambar` SET `profile` = ? WHERE `id_user` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $destination, $id);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                if (move_uploaded_file($tmp_name, $destination)) {
                    return $destination;
                } else {
                    return null;
                }
            }
        } else {
            return null;
        }
    } else {
        return null;
    }
}

function Sampul($file, $id) {
    global $conn;
    $uploads_dir = 'uploads/';
    $tmp_name = $file['tmp_name'];
    $filename = basename($file['name']);
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png");
    if (in_array($file_extension, $allowed_extensions)) {
        $hashed_filename = hash('sha256', $filename . uniqid()) . '.' . $file_extension;
        $destination = $uploads_dir . $hashed_filename;
        $sql = "UPDATE `gambar` SET `sampul` = ? WHERE `id_user` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $destination, $id);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                if (move_uploaded_file($tmp_name, $destination)) {
                    return $destination;
                } else {
                    return null;
                }
            }
        } else {
            return null;
        }
    } else {
        return null;
    }
}

function GetData($id) {
    global $conn;
    $sql = "SELECT * FROM gambar WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}


?>