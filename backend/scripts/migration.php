<?php
require_once __DIR__ . '/../config/database.php';

try {
    // Khởi tạo kết nối database
    $database = new Database();
    $conn = $database->getConnection();

    // Tạo instance của DatabaseMigration
    $migration = new DatabaseMigration($conn);
    $migration->migrate();
} catch (Exception $e) {
    die("Lỗi kết nối: " . $e->getMessage() . "\n");
}

class DatabaseMigration
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function migrate()
    {
        try {
            $this->conn->exec("SET FOREIGN_KEY_CHECKS = 0");

            $tables = [
                "users" => "CREATE TABLE IF NOT EXISTS users (
                    id INT PRIMARY KEY AUTO_INCREMENT,
                    username VARCHAR(50) UNIQUE,
                    email VARCHAR(100) UNIQUE,
                    password VARCHAR(255),
                    full_name VARCHAR(100),
                    role ENUM('student', 'teacher', 'admin'),
                    phone VARCHAR(20),
                    address TEXT,
                    avatar VARCHAR(255) DEFAULT NULL,
                    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
                    last_login TIMESTAMP NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )",
                "contacts" => "CREATE TABLE IF NOT EXISTS contacts (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    subject VARCHAR(255) NOT NULL,
                    message TEXT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )",
            ];

            foreach ($tables as $tableName => $query) {
                try {
                    $this->conn->exec($query);
                    echo "Bảng {$tableName} đã được tạo thành công.\n";
                } catch (PDOException $e) {
                    echo "Lỗi khi tạo bảng {$tableName}: " . $e->getMessage() . "\n";
                }
            }

            $this->conn->exec("SET FOREIGN_KEY_CHECKS = 1");

            echo "Migration hoàn tất!\n";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage() . "\n";
        }
    }
}
