<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($login, $email, $tel, $date_birth, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (login, email, phone, birthday, password) VALUES ('$login', '$email', '$tel', '$date_birth', '$hashedPassword')";

        if ($this->db->getConnection()->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = $this->db->getConnection()->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                return true;
            }
        }
        return false;
    }
}

?>
