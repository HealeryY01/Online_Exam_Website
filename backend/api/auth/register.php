<?php
require_once '../../config/cors.php';


include_once '../../config/database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

try {
    $data = json_decode(file_get_contents("php://input"));

    if (empty($data->email) || empty($data->password) || empty($data->role)) {
        throw new Exception("Vui lòng điền đầy đủ thông tin bắt buộc");
    }

    if ($user->emailExists($data->email)) {
        throw new Exception("Email đã được sử dụng");
    }

    $userData = [
        'username' => $data->username,
        'email' => $data->email,
        'password' => password_hash($data->password, PASSWORD_DEFAULT),
        'full_name' => $data->full_name,
        'role' => $data->role,
        'phone' => $data->phone ?? null,
        'address' => $data->address ?? null,
        'status' => 'active'
    ];

    if ($user->create($userData)) {
        http_response_code(201);
        echo json_encode([
            "success" => true,
            "message" => "Đăng ký thành công"
        ]);
    } else {
        throw new Exception("Không thể tạo ti khoản");
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}