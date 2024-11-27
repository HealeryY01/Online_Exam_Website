<?php
require_once(__DIR__ . '/../config/database.php');

class DatabaseChecker
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function checkTables()
    {
        $required_tables = [
            'users',
        ];

        echo "Kiểm tra các bảng:\n";
        foreach ($required_tables as $table) {
            $result = $this->conn->query("SHOW TABLES LIKE '$table'");
            if ($result->num_rows > 0) {
                echo "✓ Bảng $table: OK\n";

                // Kiểm tra dữ liệu
                $count = $this->conn->query("SELECT COUNT(*) as count FROM $table")->fetch_assoc()['count'];
                echo "  - Số bản ghi: $count\n";
            } else {
                echo "✗ Bảng $table: Chưa được tạo\n";
            }
        }
    }
}

// Chạy kiểm tra
$checker = new DatabaseChecker($conn);
$checker->checkTables();
