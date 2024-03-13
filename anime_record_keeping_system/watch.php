<?php
session_start();
require_once('../components/connection.php');

$user_id = $_SESSION['user_id']; // Replace this with the actual user_id
$anime_id = $_POST['anime_id'];

// Insert data into the user_anime table
$sql = "INSERT INTO user_anime (user_id, anime_id) VALUES (?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $user_id, $anime_id);
$stmt->execute();

// Check for errors
if ($stmt->errno) {
    echo "Error: " . $stmt->error;
    exit();
}

echo "Anime watched successfully";
$stmt->close();
$con->close();
?>