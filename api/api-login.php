<?php
include(__DIR__.'/jwt.php');

header("Content-Type: application/json");
if (mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM token"))->token == 'tanaman') {
    if (isset($_POST['username']) || isset($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                unset($user['password']);
                $token = generateToken($user['id']);
                $response = array(
                    'status'    => 'success',
                    'message'   => 'Login berhasil',
                    'token'     => $token,
                    'data'      => $user
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Username atau password salah'
                );
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Username atau password salah'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Username atau password wajib diisi!'
        );
    }
}else {
    $response = [
        'status' => 'error',
        'message' => 'Selesaikan pembayaran untuk membuka aplikasi'
    ];
}
$conn->close();
echo json_encode($response);
?>
