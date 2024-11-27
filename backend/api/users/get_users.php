<?php
require_once '../../config/cors.php';
setCorsHeaders();

require_once '../../config/database.php';
require_once '../../models/User.php';


$database = new Database();
$db = $database->getConnection();
$user = new User($db);


try {
    $users = $user->getAllUsers();

    http_response_code(200);
    echo json_encode([
        "success" => true,
        "users" => $users
    ]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
