<?php
// Enable error reporting trong môi trường development
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Require các file cấu hình
require_once __DIR__ . '/config/cors.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/vendor/autoload.php';

// Set CORS headers


// Lấy request URI và method
$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

// Xử lý routing
$routes = [
    'GET' => [
        '/api/users' => 'api/users/get_users.php',
        '/api/user/profile' => 'api/users/get_profile.php'
    ],
    'POST' => [
        '/api/auth/login' => 'api/auth/login.php',
        '/api/auth/register' => 'api/auth/register.php',
        '/api/users' => 'api/users/create_users.php'
    ],
    'PUT' => [
        '/api/users' => 'api/users/update_users.php'
    ],
    'DELETE' => [
        '/api/users' => 'api/users/delete_users.php'
    ]
];

// Kiểm tra route có tồn tại
if (isset($routes[$request_method][$request_uri])) {
    $file = __DIR__ . '/' . $routes[$request_method][$request_uri];
    if (file_exists($file)) {
        require $file;
    } else {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'message' => 'API endpoint không tồn tại'
        ]);
    }
} else {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'Route không tồn tại'
    ]);
}