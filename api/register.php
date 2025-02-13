<?php
include 'connect.php'; // Include the PostgreSQL connection

if (isset($_POST['signUp'])) {
    // Get form values
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password using MD5
    $hashedPassword = md5($password);

    try {
        // Check if the username already exists
        $checkUsernameQuery = "SELECT 1 FROM users WHERE username = :username";
        $stmt = $pdo->prepare($checkUsernameQuery);
        $stmt->execute(['username' => $username]);

        // If the username already exists
        if ($stmt->rowCount() > 0) {
            echo "Username already exists!";
        } else {
            // Insert the new user into the table
            $insertQuery = "INSERT INTO users (fName, lName, username, password) VALUES (:fName, :lName, :username, :password)";
            $insertStmt = $pdo->prepare($insertQuery);
            $insertResult = $insertStmt->execute([
                'fName' => $fName,
                'lName' => $lName,
                'username' => $username,
                'password' => $hashedPassword
            ]);

            if ($insertResult) {
                // Redirect after successful registration
                header("Location: login.php?registered=true");
                exit();
            } else {
                // Output error if the insert fails
                echo "Error: " . $insertStmt->errorInfo()[2];
            }
        }
    } catch (PDOException $e) {
        // Handle any errors with database queries
        echo "Error: " . $e->getMessage();
    }
}

// Check if the signIn form is submitted
if (isset($_POST['signIn'])) {
    // Get form values
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Validate the username and password
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password using MD5
            if (md5($password) === $row['password']) {
                session_start();
                $_SESSION['username'] = $row['username'];
                header("Location: homepage.php");
                exit();
            } else {
                echo "Incorrect username or password";
            }
        } else {
            echo "Incorrect username or password";
        }
    } catch (PDOException $e) {
        // Handle any errors with database queries
        echo "Error: " . $e->getMessage();
    }
}
?>
