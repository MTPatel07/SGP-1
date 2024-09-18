<?php
session_start();
include 'db/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['user_type'] != 'worker') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $occupation = $_POST['occupation'];
    $job_description = $_POST['job_description'];
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE workers SET occupation = '$occupation', job_description = '$job_description' WHERE id = '$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Job posted successfully";
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
    <title>Worker Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Worker Profile</h2>
        <form action="worker.php" method="POST">
            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" required>

            <label for="job_description">Job Description:</label>
            <textarea id="job_description" name="job_description" required></textarea>

            <button type="submit">Post Job</button>
        </form>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
