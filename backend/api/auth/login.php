<?php
require_once '../../config/cors.php';
setCorsHeaders();

include_once '../../config/database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

function sendResponse($status, $success, $message, $data = null)
{
    http_response_code($status);

    $response = [
        "success" => $success,
        "message" => $message
    ];

    if ($data) {
        $response["data"] = $data;
    }

    echo json_encode($response);
}


try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse(405, false, "Phương thức không được phép");
        return;
    }

    $data = json_decode(file_get_contents("php://input"));

    if (!$data) {
        sendResponse(400, false, "Dữ liệu không hợp lệ");
        return;
    }

    if (empty($data->email) || empty($data->password)) {
        sendResponse(400, false, "Vui lòng nhập email và mật khẩu");
        return;
    }

    $userData = $user->login($data->email);

    if (!$userData) {
        sendResponse(401, false, "Email không tồn tại");
        return;
    }

    if (!password_verify($data->password, $userData['password'])) {
        sendResponse(401, false, "Mật khẩu không chính xác");
        return;
    }

    if ($userData['status'] !== 'active') {
        sendResponse(401, false, "Tài khoản của bạn đã bị vô hiệu hóa");
        return;
    }

    unset($userData['password']);
    sendResponse(200, true, "Đăng nhập thành công", ["user" => $userData]);
} catch (Exception $e) {
    sendResponse(500, false, "Lỗi server: " . $e->getMessage());
}
