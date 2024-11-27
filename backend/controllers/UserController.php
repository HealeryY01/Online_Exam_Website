<?php
require_once '../config/database.php';
require_once '../models/User.php';

class UserController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function createUser($data)
    {
        if (empty($data->username) || empty($data->email) || empty($data->password)) {
            throw new Exception("Vui lòng điền đầy đủ thông tin!");
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
            return ["success" => true, "message" => "Tạo người dùng thành công"];
        } else {
            throw new Exception("Không thể tạo tài khoản");
        }
    }

    public function deleteUser($data)
    {
        if (empty($data->id)) {
            throw new Exception("Thiếu ID người dùng!");
        }

        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);

        if ($stmt->execute([':id' => $data->id])) {
            return ["success" => true, "message" => "Xóa người dùng thành công"];
        } else {
            throw new Exception("Không thể xóa người dùng");
        }
    }

    public function getAllUsers()
    {
        return $this->user->getAllUsers();
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
}
