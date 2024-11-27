<?php
class Database
{
    private $host = "localhost";
    private $db_name = "online_exam";
    private $username = "root";
    private $password = "";
    private $conn = null;

    public function getConnection()
    {
        try {
            if ($this->conn === null) {
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                    $this->username,
                    $this->password
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("set names utf8");
            }
            return $this->conn;
        } catch (PDOException $e) {
            throw new Exception("Lỗi kết nối: " . $e->getMessage());
        }
    }
}
