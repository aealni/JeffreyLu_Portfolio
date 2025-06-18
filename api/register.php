<?php
include 'connect.php'; // Include the PostgreSQL connection

if (isset($_POST['signUp'])) {
    // Get form values
    $fName = trim($_POST['fName']);
    $lName = trim($_POST['lName']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Hash the password using MD5
    $hashedPassword = md5($password);

    try {
        // Check if the username already exists
        $stmt = $pdo->prepare("SELECT 1 FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);

        if ($stmt->fetch()) {  // If any result exists
            echo "Username already exists!";
        } else {
            // Insert the new user into the table
            $insertStmt = $pdo->prepare(
                "INSERT INTO users (fName, lName, username, password) 
                VALUES (:fName, :lName, :username, :password)"
            );
            $insertResult = $insertStmt->execute([
                ':fName' => $fName,
                ':lName' => $lName,
                ':username' => $username,
                ':password' => $hashedPassword
            ]);

            if ($insertResult) {
                header("Location: login.php?registered=true");
                exit();
            } else {
                echo "Error: Could not register user.";
            }
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}

// Check if the signIn form is submitted
if (isset($_POST['signIn'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && md5($password) === $row['password']) {
            session_start();
            $_SESSION['username'] = $row['username'];
            header("Location: homepage.php");
            exit();
        } else {
            echo "Incorrect username or password.";
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>
