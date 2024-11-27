<?php
require_once '../config/database.php';
require_once '../models/User.php';

class AuthController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login($data)
    {
        if (empty($data->email) || empty($data->password)) {
            throw new Exception("Vui lòng nhập email và mật khẩu");
        }

        $userData = $this->user->login($data->email);

        if (!$userData) {
            throw new Exception("Email không tồn tại");
        }

        if (!password_verify($data->password, $userData['password'])) {
            throw new Exception("Mật khẩu không chính xác");
        }

        if ($userData['status'] !== 'active') {
            throw new Exception("Tài khoản của bạn đã bị vô hiệu hóa");
        }

        unset($userData['password']);
        return ["success" => true, "user" => $userData];
    }

    public function register($data)
    {
        if (empty($data->email) || empty($data->password) || empty($data->role)) {
            throw new Exception("Vui lòng điền đầy đủ thông tin bắt buộc");
        }

        if ($this->user->emailExists($data->email)) {
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

        if ($this->user->create($userData)) {
            return ["success" => true, "message" => "Đăng ký thành công"];
        } else {
            throw new Exception("Không thể tạo tài khoản");
        }
    }
}
