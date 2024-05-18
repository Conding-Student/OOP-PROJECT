<?php 
require "database.php";
require "../Classes/OOP.php";

// Create a new Comment instance
$values = new Name();

if (isset($_POST['personal-submit']))
{
    $comment = trim($_POST['comment']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
   
    // Check if the comment is not empty
    if (empty($comment)) {
        feedback("Comment cannot be empty!");
        exit;
    }

    // Insert the comment and check if it was successful
    if ($values->insertion($connection, $name, $email, $comment)) {
        header("Location: ../index.php");
        exit;
    } else {
        feedback("Error!");
    }
}
// Function to provide feedback
function feedback($message) {
    echo "<script>alert('$message');</script>";
}