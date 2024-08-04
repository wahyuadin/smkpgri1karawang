<?php
header("Content-Type: application/json; charset=UTF-8");
$data = ['status' => 'error','message' => 'Halaman tidak diizinkan!'];
echo json_encode($data);
?>