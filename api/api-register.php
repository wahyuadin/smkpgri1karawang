<?php
include(__DIR__.'/jwt.php');
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nama'])) {
    $username   = htmlspecialchars($_POST['username']);
    $password   = htmlspecialchars($_POST['password']);
    $nama       = htmlspecialchars($_POST['nama']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    
    if ($result) {
        if ($result->num_rows > 0) {
            $response = array(
                'status' => 'error',
                'message' => 'Username sudah terdaftar',
            );
        } else {
            $sql = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$hashedPassword')";
            if ($conn->query($sql) === TRUE) {
                $newUserId = $conn->insert_id;
                $conn->query("INSERT INTO gambar (id_user) VALUES ('$newUserId')");
                $token = generateToken($newUserId);
                $response = array(
                    'status' => 'success',
                    'message' => 'Registrasi berhasil',
                    'data'  => ['user_id' => $newUserId, 'token' => $token]
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Registrasi gagal: ' . $conn->error
                );
            }
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error dalam melakukan query: ' . $conn->error
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Data yang diperlukan tidak lengkap'
    );
}

$conn->close();
echo json_encode($response);
?>
