<?php
require_once __DIR__ . '/../models/Movies.php';
require_once __DIR__ . '/../controllers/Moviecontroller.php'; 
require_once __DIR__ . '/../database.php';

$db = new Database();
$movieModel = new Movies($db);
$movieController = new Moviecontroller($movieModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $reviews = $_POST['reviews'];

    $movieController->createMovie($title, $author, $description, $reviews);
    header('Location: display.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <link rel="stylesheet" href="../styles/actions.css">
</head>
<body>
    <div class="main-container">
        <h1>Add New Movie</h1>
        <form method="POST" action="">
            <div class="form-container">
                <div class="form-group">
                    <label for="title">Title:</label> 
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="author">Author/Director:</label> 
                    <input type="text" id="author" name="author" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label> 
                    <input type="text" id="description" name="description" required>
                </div>

                <div class="form-group">
                    <label for="reviews">Reviews:</label> 
                    <input type="text" id="reviews" name="reviews" required>
                </div>

                <input type="submit" value="Create Movie" class="submit-button">
            </div>
        </form>
        <h2><a href="display.php">Back to Movie List</a></h2>
    </div>
</body>
</html>