<?php
require_once '../../config/cors.php';
require_once '../../controllers/AuthController.php';

$authController = new AuthController();

try {
    $data = json_decode(file_get_contents("php://input"));
    $response = $authController->register($data);
    http_response_code(201);
    echo json_encode($response);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
