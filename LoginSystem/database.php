<?php
class Database {
    private $hostname = "localhost";
    private $database_name = "loginPHP";
    private $username = "root";
    private $password = "";
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->hostname};dbname={$this->database_name}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pdo_exception) {
            echo "Connect database failed " . $pdo_exception;
        }
    }

    public function get_pdo(){
        return $this->pdo;
    }
}
?>