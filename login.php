<?php
session_start();
include 'db/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contact_number = $_POST['contact_number'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type']; // 'worker' or 'user'

    if ($user_type == 'worker') {
        $sql = "SELECT * FROM workers WHERE contact_number = '$contact_number'";
    } else {
        $sql = "SELECT * FROM users WHERE contact_number = '$contact_number'";
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['user_id'] = $row['id'];
            header('Location: profile.php');
            exit();
        } else {
            echo "<script>alert('Invalid Password');</script>";

        }
    } else {
        echo "<script>alert('No user found with this contact number');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

             <label for="user_type">I am a:</label>
            <select id="user_type" name="user_type" required>
                <option value="worker">Worker</option>
                <option value="user">User</option> 
            </select>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
