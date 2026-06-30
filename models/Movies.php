<?php

class Movies {
    private $db;
    private $table = 'movies';

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllMovies() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->db->getConnection()->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];          
        }
    }

    public function getMovieById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
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

    public function createMovie($title, $author, $description, $reviews) {
        $query = "INSERT INTO " . $this->table . " (title, author, description, reviews) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bind_param("ssss", $title, $author, $description, $reviews);
        return $stmt->execute();
    }

    public function updateMovie($id, $title, $author, $description, $reviews) {
        $query = "UPDATE " . $this->table . " SET title = ?, author = ?, description = ?, reviews = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bind_param("ssssi", $title, $author, $description, $reviews, $id);
        return $stmt->execute();
    }

    public function deleteMovie($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>