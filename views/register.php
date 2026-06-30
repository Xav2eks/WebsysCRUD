<?php

require_once __DIR__ . '/../models/Users.php';

require_once __DIR__ . '/../controllers/Usercontroller.php'; 

require_once __DIR__ . '/../database.php';

$db = new Database();
$userModel = new Users($db);
$userController = new Usercontroller($userModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    $userController->createUser($firstname, $lastname, $username, $password, $role, $status);
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/registerlogin.css">
</head>
<body>
    <div class="main-container">
        <h1>CREATE NEW USER</h1>
        <form method="POST" action="">
            <div class="form-container">
                <div class="form-group">
                    <label for="firstname">Firstname:</label> 
                    <input type="text" id="firstname" name="firstname" required>
                </div>

                <div class="form-group">
                    <label for="Lastname">Lastname:</label> 
                    <input type="text" id="lastname" name="lastname" required>
                </div>

                <div class="form-group">
                    <label for="username">Username:</label> 
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label> 
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group"> 
                    <label for="role">Role:</label>
                    <input type="text" id="role" name="role" required>
                </div>
            
                <div class="form-group"> 
                    <label for="status">Status:</label>
                    <input type="text" id="status" name="status" required>
                </div>

                <input type="submit" value="Create User" class="submit-button">
            </div>
        </form>
        <a href="login.php" class="footer">Have an account? Go to Login</a>
    </div>
    
</body>
</html>


