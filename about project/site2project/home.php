<?php
session_start();

// database connection
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "site2database";
// Connecting to the database
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

// Display error message if connection has failed
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check if the user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header('Location: restricted1.php');
    exit;
}

// check if the user has submitted the login form
if (isset($_POST['login'])) {
    // validate and sanitize the form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
    // check if the email and password match a user in the database
    // use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? ");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['logged_in'] = true;
        if($user['role'] === 'admin'){
          $_SESSION['admin'] = true;
        }
        header('Location: restricted1.php');
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}

// check if the user has submitted the signup form
if (isset($_POST['signup'])) {
    // validate and sanitize the form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

    // check if the passwords match
    if ($password != $confirm_password) {
        $error = "Passwords do not match.";
    } else if(empty($role)){
        $error = "Role is required";
    } else {
        // check if the email is already in use
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $error = "Email is already in use.";
        } else {
            // hash the password for security
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            // insert the new user into the database
            $stmt = $conn->prepare("INSERT INTO users (name,email,password,role) VALUES (?, ?, ?,?)");
            $stmt->bind_param("ssss", $name, $email, $password,$role);
            $stmt->execute();
            $_SESSION['logged_in'] = true;
            if($role === 'admin'){
              $_SESSION['admin'] = true;
            }
            header('Location: restricted1.php');
            exit;
        }
    }
}
?>




<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
</head>


<body>
    <h1>HOME PAGE</h1>
    <br>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <h2>Login</h2>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>   
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="login" value="Login">
    </form>
    <br>
    <h2>Signup</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <br>
        <label for="role">Role:</label>
        <select name="role" id="role">
          <option value="">Choose</option>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
        <br>
        <input type="submit" name="signup" value="Signup">
    </form>
</body>
</html>

        
