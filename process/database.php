<?php
// Trying to run a code which has a high probability of making an error
try {
    // Defining a constant value 
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DATABASE", "alim");

    // Setting up a connection into the database that we have
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
    
    // Generating an error message
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    // The database will be closed eventually, and it will display its reason of failure
    die("Connection has failed miserably. The reason was: " . $error->getMessage());
}
