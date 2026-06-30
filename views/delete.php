<?php
require_once __DIR__ . '/../models/Movies.php';
require_once __DIR__ . '/../controllers/Moviecontroller.php'; 
require_once __DIR__ . '/../database.php';

$db = new Database();
$movieModel = new Movies($db);
$movieController = new Moviecontroller($movieModel);

if (isset($_GET['id'])) {
    $movieController->deleteMovie($_GET['id']);
}

header("Location: /testvitualla/views/display.php");
exit;
?>