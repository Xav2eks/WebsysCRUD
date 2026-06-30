<?php

class Users {
    private $db;
    private $table = 'users';

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($firstname, $lastname, $username, $password, $role, $status) {
        $query = "INSERT INTO users (firstname, lastname, username, password, role, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bind_param("ssssss", $firstname, $lastname, $username, $password, $role, $status);
        return $stmt->execute();
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

}

?>