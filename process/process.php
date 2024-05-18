<?php 
require "database.php";
require "../Classes/OOP.php";

// Create a new Comment instance
$komento = new Comment();

if (isset($_POST['comment-submit'])) {
    $comment = trim($_POST['comment']);

    // Check if the comment is not empty
    if (empty($comment)) {
        feedback("Comment cannot be empty!");
        exit;
    }

    // Insert the comment and check if it was successful
    if ($komento->insertComment($connection, $comment)) {
        header("Location: ../index.php");
        exit;
    } else {
        feedback("Error inserting comment!");
    }
}

// Function to provide feedback
function feedback($message) {
    echo "<script>alert('$message');</script>";
}
