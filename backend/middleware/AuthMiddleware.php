<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../utils/Logger.php';

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class AuthMiddleware
{
    public static function authenticate()
    {
        $headers = getallheaders();

        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Token không tồn tại']);
            exit();
        }

        try {
            $token = str_replace('Bearer ', '', $headers['Authorization']);
            $config = require(__DIR__ . '/../config/config.php');

            // Sử dụng Key object cho JWT::decode
            $decoded = JWT::decode($token, new Key($config['jwt_secret'], 'HS256'));

            // Lưu thông tin user vào biến global
            global $user;
            $user = (array) $decoded;

            return true;
        } catch (Exception $e) {
            Logger::log($e->getMessage(), 'error');
            http_response_code(401);
            echo json_encode(['error' => 'Token không hợp lệ']);
            exit();
        }
    }

    public static function isTeacher()
    {
        global $user;
        return isset($user['role']) && $user['role'] === 'teacher';
    }

    public static function isStudent()
    {
        global $user;
        return isset($user['role']) && $user['role'] === 'student';
    }
}
