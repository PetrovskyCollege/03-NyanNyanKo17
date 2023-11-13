<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "MAP_BD";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }


    public function getUserById($user_id) {
        $sql = "SELECT * FROM user WHERE id = $user_id";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>

