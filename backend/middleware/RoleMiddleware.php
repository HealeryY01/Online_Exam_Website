<?php
class RoleMiddleware
{
    public static function checkRole($requiredRole)
    {
        global $user;
        if ($user['role'] !== $requiredRole) {
            http_response_code(403);
            echo json_encode(['error' => 'Không có quyền truy cập']);
            exit();
        }
    }
}
