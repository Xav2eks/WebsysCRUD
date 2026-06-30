<?php

class Moviecontroller {
    private $movieModel;

    public function __construct($movieModel) {
        $this->movieModel = $movieModel;
    }

    public function getAllMovies() {
        return $this->movieModel->getAllMovies();
    }

    public function getMovieById($id) {
        return $this->movieModel->getMovieById($id);
    }

    public function createMovie($title, $author, $description, $reviews) {
        return $this->movieModel->createMovie($title, $author, $description, $reviews);
    }

    public function updateMovie($id, $title, $author, $description, $reviews) {
        return $this->movieModel->updateMovie($id, $title, $author, $description, $reviews);
    }

    public function deleteMovie($id) {
        return $this->movieModel->deleteMovie($id);
    }
}

?>