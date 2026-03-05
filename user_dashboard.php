<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo $_SESSION['username']; ?> 🎉</h1>
<p>You are logged in as a user.</p>

<a href="../index.php">Logout</a>

</body>
</html>