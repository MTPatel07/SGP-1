<?php
session_start();
include 'db/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['user_type'] != 'user') {
    header('Location: login.php');
    exit();
}

$location = $_POST['location'] ?? '';
$sql = "SELECT * FROM workers WHERE location LIKE '%$location%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <form action="user.php" method="POST">
            <label for="location">Your Location:</label>
            <input type="text" id="location" name="location" required>

            <button type="submit">Find Workers</button>
        </form>

        <h3>Available Workers:</h3>
        <ul>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['name']} - {$row['occupation']} - {$row['contact_number']}</li>";
            }
            ?>
        </ul>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
