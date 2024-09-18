<?php
include 'db/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $location = $_POST['location'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $user_type = $_POST['user_type']; // 'worker' or 'user'

    if ($user_type == 'worker') {
        $sql = "INSERT INTO workers (name, contact_number, location, password) VALUES ('$name', '$contact_number', '$location', '$password')";
    } else {
        $sql = "INSERT INTO users (name, contact_number, location, password) VALUES ('$name', '$contact_number', '$location', '$password')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="user_type">I am a:</label>
            <select id="user_type" name="user_type" required>
                <option value="worker">Worker</option>
                <option value="user">User</option>
            </select>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
