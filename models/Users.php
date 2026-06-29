<?php

class Users {
    private $db;
    private $table = 'users';

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        
        $result = $this->db->getConnection()->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];          
        }
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function updateUser($id, $name, $role, $status) {
        $query = "UPDATE users SET name = ?, role = ?, status = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bind_param("sssi", $name, $role, $status, $id);
        return $stmt->execute();
    }

    public function createUser($name, $role, $status) {
        $query = "INSERT INTO users (name, role, status) VALUES (?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bind_param("sss", $name, $role, $status);
        return $stmt->execute();
    }

}

?>