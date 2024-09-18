<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to Your Profile</h2>
        <?php
        if ($_SESSION['user_type'] == 'worker') {
            echo '<a href="worker.php">Post a Job</a>';
        } else {
            echo '<a href="user.php">Find Workers</a>';
        }
        ?>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
