<?php
header("Content-Type: application/json");
require 'database.php'; // Kết nối đến cơ sở dữ liệu

$data = json_decode(file_get_contents("php://input"));

if (isset($data->name) && isset($data->email) && isset($data->subject) && isset($data->message)) {
    $name = $data->name;
    $email = $data->email;
    $subject = $data->subject;
    $message = $data->message;

    // Lưu thông tin vào cơ sở dữ liệu hoặc gửi email
    // Ví dụ: lưu vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Tin nhắn đã được gửi."]);
    } else {
        echo json_encode(["success" => false, "message" => "Có lỗi xảy ra khi gửi tin nhắn."]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Thiếu thông tin."]);
}
$conn->close();