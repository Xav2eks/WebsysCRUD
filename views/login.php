<?php
// $_SESSION removed entirely from here

require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../controllers/Usercontroller.php'; 
require_once __DIR__ . '/../database.php';

$db = new Database();
$userModel = new Users($db);
$userController = new Usercontroller($userModel);

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userController->login($username, $password);

    if ($user) {
        header("Location: display.php");
        exit();
    } else {
        $error = 'Invalid username or password!';
    }
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
        <h1>LOGIN</h1>
        
        <?php if (!empty($error)): ?>
            <p style="color: red; font-weight: bold;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-container">
                <div class="form-group">
                    <label for="username">Username:</label> 
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label> 
                    <input type="password" id="password" name="password" required>
                </div>

                <input type="submit" value="Login" class="submit-button">
            </div>
        </form>
        <a href="register.php" class="footer">Don't have an account? Go to Register</a>
    </div>
</body>
</html>