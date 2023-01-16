<?php
session_start();

// check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    header('Location: home.php');
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Restricted Page 2</title>
</head>
<body>
    <h1>Welcome to Restricted Page 2</h1>
    <a href="restricted1.php">Restricted Page 1</a>
    <a href="logout.php">Logout</a>
</body>
</html>