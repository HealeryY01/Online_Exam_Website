<?php
require_once '../../config/cors.php';
require_once '../../controllers/AuthController.php';

$authController = new AuthController();

function sendResponse($status, $success, $message, $data = null)
{
    http_response_code($status);
    $response = ["success" => $success, "message" => $message];
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
    $response = $authController->login($data);
    sendResponse(200, true, "Đăng nhập thành công", $response);
} catch (Exception $e) {
    sendResponse(500, false, "Lỗi server: " . $e->getMessage());
}
