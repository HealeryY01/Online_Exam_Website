<?php
require_once __DIR__ . '/../config/database.php';

// Khởi tạo kết nối
$database = new Database();
$conn = $database->getConnection();

class DatabaseSeeder
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    private function clearData()
    {
        try {
            // Tắt kiểm tra khóa ngoại
            $this->conn->query("SET FOREIGN_KEY_CHECKS = 0");

            // Danh sách bảng theo thứ tự (để tránh lỗi khóa ngoại)
            $tables = [
                'users',
                'contacts'
            ];

            // Xóa dữ liệu từng bảng
            foreach ($tables as $table) {
                $this->conn->query("TRUNCATE TABLE $table");
                echo "Đã xóa dữ liệu bảng {$table}\n";
            }

            // Bật lại kiểm tra khóa ngoại
            $this->conn->query("SET FOREIGN_KEY_CHECKS = 1");
            echo "Đã xóa toàn bộ dữ liệu cũ\n";
        } catch (Exception $e) {
            echo "Lỗi khi xóa dữ liệu: " . $e->getMessage() . "\n";
            throw $e;
        }
    }

    public function seed()
    {
        try {
            // Xóa dữ liệu cũ trước
            $this->clearData();

            // Thêm dữ liệu mới
            $this->seedUsers();

            // Thêm dữ liệu cho bảng contacts
            $this->seedContacts();

            echo "Seeding hoàn tất!\n";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage() . "\n";
        }
    }

    private function seedUsers()
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'full_name' => 'Administrator',
                'role' => 'admin',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'avatar' => 'default-avatar.png',
                'status' => 'active'
            ],
            [
                'username' => 'teacher1',
                'email' => 'teacher1@example.com',
                'password' => password_hash('teacher123', PASSWORD_DEFAULT),
                'full_name' => 'Giáo viên 1',
                'role' => 'teacher',
                'phone' => '0123456788',
                'address' => 'Hà Nội',
                'avatar' => 'default-avatar.png',
                'status' => 'active'
            ],
            [
                'username' => 'student1',
                'email' => 'student1@example.com',
                'password' => password_hash('student123', PASSWORD_DEFAULT),
                'full_name' => 'Học sinh 1',
                'role' => 'student',
                'phone' => '0123456787',
                'address' => 'Hà Nội',
                'avatar' => 'default-avatar.png',
                'status' => 'active'
            ]
        ];

        $stmt = $this->conn->prepare("
            INSERT INTO users (
                username, email, password, full_name, role, 
                phone, address, avatar, status
            ) VALUES (
                :username, :email, :password, :full_name, :role,
                :phone, :address, :avatar, :status
            )
        ");

        foreach ($users as $user) {
            $stmt->execute([
                ':username' => $user['username'],
                ':email' => $user['email'],
                ':password' => $user['password'],
                ':full_name' => $user['full_name'],
                ':role' => $user['role'],
                ':phone' => $user['phone'],
                ':address' => $user['address'],
                ':avatar' => $user['avatar'],
                ':status' => $user['status']
            ]);
        }
    }

    private function seedContacts()
    {
        $contacts = [
            [
                'name' => 'Nguyễn Văn A',
                'email' => 'nguyenvana@example.com',
                'subject' => 'Hỏi về khóa học',
                'message' => 'Tôi muốn biết thêm thông tin về khóa học.',
            ],
            [
                'name' => 'Trần Thị B',
                'email' => 'tranthib@example.com',
                'subject' => 'Phản hồi',
                'message' => 'Khóa học rất hữu ích, cảm ơn!',
            ],
        ];

        $stmt = $this->conn->prepare("
            INSERT INTO contacts (
                name, email, subject, message
            ) VALUES (
                :name, :email, :subject, :message
            )
        ");

        foreach ($contacts as $contact) {
            $stmt->execute([
                ':name' => $contact['name'],
                ':email' => $contact['email'],
                ':subject' => $contact['subject'],
                ':message' => $contact['message']
            ]);
        }
    }
}

// Khởi tạo và chạy seeder
$seeder = new DatabaseSeeder($conn);
$seeder->seed();