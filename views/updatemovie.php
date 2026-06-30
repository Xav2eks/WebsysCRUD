<?php
require_once __DIR__ . '/../models/Movies.php';
require_once __DIR__ . '/../controllers/Moviecontroller.php'; 
require_once __DIR__ . '/../database.php';

$db = new Database();
$movieModel = new Movies($db);
$movieController = new Moviecontroller($movieModel);

if (isset($_GET['id'])) {
    $movie = $movieController->getMovieById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $reviews = $_POST['reviews'];

    $movieController->updateMovie($id, $title, $author, $description, $reviews);
    header('Location: display.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
    <link rel="stylesheet" href="../styles/actions.css">
</head>
<body>
    <div class="main-container">
        <h1>Update Movie Details</h1>
        
        <?php if ($movie): ?>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($movie['id']); ?>">

            <div class="form-container">
                <div class="form-group">
                    <label for="title">Title:</label> 
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($movie['title']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="author">Author/Director:</label> 
                    <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($movie['author']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label> 
                    <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($movie['description']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="reviews">Reviews:</label> 
                    <input type="text" id="reviews" name="reviews" value="<?php echo htmlspecialchars($movie['reviews']); ?>" required>
                </div>

                <input type="submit" value="Update Movie" class="submit-button">
            </div>
        </form>
        <?php else: ?>
            <p>Movie record not found.</p>
        <?php endif; ?>

        <h2><a href="display.php">Back to Movie List</a></h2>
    </div>
</body>
</html>