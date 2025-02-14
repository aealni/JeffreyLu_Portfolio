<?php
// Get the DATABASE_URL_UNPOOLED from environment variables
$databaseUrl = getenv('DATABASE_URL_UNPOOLED');

if (!$databaseUrl) {
    die("DATABASE_URL_UNPOOLED is not set in the environment variables.");
}

// Parse the PostgreSQL connection URL
$parsedUrl = parse_url($databaseUrl);

$host = $parsedUrl['host'];
$port = $parsedUrl['port'] ?? 5432; // Default PostgreSQL port
$user = $parsedUrl['user'];
$password = $parsedUrl['pass'];
$dbname = ltrim($parsedUrl['path'], '/');

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>