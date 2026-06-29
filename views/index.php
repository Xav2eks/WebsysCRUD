<?php

require_once __DIR__ . '/../models/Users.php';

require_once __DIR__ . '/../controllers/Userconteller.php'; 

require_once __DIR__ . '/../database.php';

$db = new Database();
$userModel = new Users($db);
$userController = new Usercontroller($userModel);
$users = $userController->getAllUsers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    $userController->createUser($name, $role, $status);
    header('Location: display.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create New User</h1>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <input type="submit" value="Create User">
    </form>
    <h2><a href="display.php">Back to User List</a></h2>
</body>
</html>


