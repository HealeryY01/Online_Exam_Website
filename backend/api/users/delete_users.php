<?php
require_once '../../config/cors.php';
setCorsHeaders();

require_once '../../config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();

    $data = json_decode(file_get_contents("php://input"));

    if (empty($data->id)) {
        throw new Exception("Thiếu ID người dùng!");
    }

    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $db->prepare($query);

    if ($stmt->execute([':id' => $data->id])) {
        echo json_encode(array(
            'success' => true,
            'message' => 'Xóa người dùng thành công'
        ));
    } else {
        throw new Exception("Không thể xóa người dùng");
    }
} catch (Exception $e) {
    echo json_encode(array(
        'success' => false,
        'message' => $e->getMessage()
    ));
}
