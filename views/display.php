<?php
require_once __DIR__ . '/../models/Movies.php';
require_once __DIR__ . '/../controllers/Moviecontroller.php'; 
require_once __DIR__ . '/../database.php';

$db = new Database();
$movieModel = new Movies($db);
$movieController = new Moviecontroller($movieModel);

$movies = $movieController->getAllMovies();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <link rel="stylesheet" href="../styles/display.css">
</head>
<body>
    <div class="header">
        <div class="spacer">Logout</div>
        <h1>MOVIE MANAGEMENT SYSTEM</h1>
        <a class="logout-btn" href="./login.php">Logout</a>
    </div>
    <div class="main-container">     
        <h2><a href="addmovie.php">ADD NEW MOVIE</a></h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>AUTHOR</th>
                    <th>DESCRIPTION</th>
                    <th>REVIEWS</th>
                    <th>EDIT</th>
                    <th>DELETE</th> </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($movie['id']); ?></td>
                        <td><?php echo htmlspecialchars($movie['title']); ?></td>
                        <td><?php echo htmlspecialchars($movie['author']); ?></td>
                        <td><?php echo htmlspecialchars($movie['description']); ?></td>
                        <td><?php echo htmlspecialchars($movie['reviews']); ?></td>
                        <td><a href="updatemovie.php?id=<?php echo $movie['id']; ?>">Edit</a></td>
                        <td><a class="delete-btn" href="./delete.php?id=<?php echo $movie['id']; ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>      
    </div>
</body>
</html>