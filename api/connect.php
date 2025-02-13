<?php
// Fetching connection details from environment variables
$dsn = $_ENV['dsn'];
$username = $_ENV['username'];
$password = $_ENV['password'];

// PDO options for error handling and fetching
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
    // Establishing the connection using PDO
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    // Handling connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>
