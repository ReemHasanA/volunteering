<?php

include 'abd/connect.php';
session_start();
$_SESSION['user_name']; // Use = instead of == for assignment

if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];

    // Query the database to get the user ID based on the user name
    $query = "SELECT id FROM users WHERE name = :user_name"; // Remove single quotes around :user_name
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->execute();
    $user_id_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user_id_data) {
        // The user ID has been retrieved successfully
        $user_id = $user_id_data['id'];
    } else {
        // Handle the case where the user does not exist in the database
        echo 'User not found in the database.';
    }
} else {
    echo 'User not authenticated. Please log in or set the session.';
}

if (isset($_POST['comment'])) {
    $event_id = $_POST['event_id'];
    $comment = $_POST['comment'];

    // Insert the comment into the comments table
    $query = "INSERT INTO comments (comment, user_id, status, created_at, event_id) VALUES (:comment, :user_id, 2, NOW(), :event_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: enter_event.php?id=" . $event_id);
        // Comment added successfully, redirect back to the event page
        exit();
    } else {
        echo "Error adding the comment.";
    }
} else {
    echo "Invalid comment data.";
}
