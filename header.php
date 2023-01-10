<?php
  session_start();
  include_once 'includes/functions-inc.php';
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Proiect PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


<nav>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="https://www.fifa.com/fifaplus/en/tournaments/mens/worldcup/qatar2022">Site World Cup 2022</a></li>
    <li><a href="https://www.fifa.com/">Site FIFA</a></li>
    <li><a href="https://www.livescore.com/en/">Site LiveScore</a></li>

    <?php
            if (isset($_SESSION["useruid"])) {
              echo "<li><a href='logout.php'>Logout</a></li>";
            }
            else {
              echo "<li><a href='signup.php'>Sign up</a></li>";
              echo "<li><a href='login.php'>Log in</a></li>";
            }
      ?>

  </ul>
</nav>







</html>