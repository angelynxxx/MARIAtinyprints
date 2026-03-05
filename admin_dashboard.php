<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<body>

<h1>Admin Dashboard 👑</h1>

<p>Welcome Admin: <?php echo $_SESSION['username']; ?></p>

<h3>Admin Controls</h3>
<ul>
<li>View Users</li>
<li>Manage Products</li>
<li>Manage Orders</li>
</ul>

<a href="php/logout.php">Logout</a>

</body>
</html>