<?php
require_once '../../config/cors.php';


require_once '../../config/database.php';

try {
    $database = new Database();
    $conn = $database->getConnection();

    $data = json_decode(file_get_contents("php://input"));

    // Validate dữ liệu
    if (empty($data->username) || empty($data->email) || empty($data->password)) {
        throw new Exception("Vui lòng điền đầy đủ thông tin!");
    }

    // Kiểm tra username và email đã tồn tại chưa
    $check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->execute([$data->username, $data->email]);
    $result = $check->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        throw new Exception("Username hoặc email đã tồn tại!");
    }

    $query = "INSERT INTO users (username, email, password, full_name, role, 
              phone, address, status) 
              VALUES (:username, :email, :password, :full_name, :role, 
              :phone, :address, :status)";

    $stmt = $conn->prepare($query);

    // Hash password
    $hashed_password = password_hash($data->password, PASSWORD_DEFAULT);

    $stmt->execute([
        ':username' => $data->username,
        ':email' => $data->email,
        ':password' => $hashed_password,
        ':full_name' => $data->full_name,
        ':role' => $data->role,
        ':phone' => $data->phone,
        ':address' => $data->address,
        ':status' => $data->status
    ]);

    if ($stmt) {
        echo json_encode([
            'success' => true,
            'message' => 'Tạo người dùng thành công'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
