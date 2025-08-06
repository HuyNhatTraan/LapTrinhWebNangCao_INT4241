<?php
    class Database {
        private static $instance = null;
        private $connection;
        private $host = "localhost";
        private $dbName = "HT_Tech_LTWNC";
        private $username = "root"; 
        private $password = "Anhem123";

        // Constructor private: ngăn bên ngoài tạo new
        private function __construct() {
            try {
                $this->connection = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4",
                    $this->username,
                    $this->password
                );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected!"; // Debug nếu muốn
            } catch (PDOException $e) {
                die("DB connection failed: " . $e->getMessage());
            }
        }

        // Hàm public để lấy instance
        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        
        public function getConnection() {
            return $this->connection;
        }
    }
?>
