<?php
require_once __DIR__ . '/../models/Users.php';

require_once __DIR__ . '/../controllers/Userconteller.php'; 

require_once __DIR__ . '/../database.php';

$db = new Database();
$userModel = new Users($db);
$userController = new Usercontroller($userModel);
$users = $userController->getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td><?php echo htmlspecialchars($user['status']); ?></td>
                    <td><a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <table>
            <h2><a href="index.php">Create New User</a></h2>
        </table>
</body>
</html>

