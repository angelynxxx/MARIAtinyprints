<?php
session_start();
include 'db.php';

// Make sure form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get username and password from POST
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Prepare SQL statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Check password using password_verify
        if (password_verify($password, $row['password'])) {

            // Login success, store session
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] === 'admin') {
                header("Location: ../admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();

        } else {
            // Password incorrect
            echo "Wrong password!";
        }

    } else {
        // Username not found
        echo "User not found!";
    }

    $stmt->close();
    $conn->close();
    
}
?>