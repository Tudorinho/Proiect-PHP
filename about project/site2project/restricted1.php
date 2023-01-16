<?php
session_start();

// check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    header('Location: home.php');
    exit;
}
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Restricted Page 1</title>
</head>


<body>
    <h2>Restricted Page 1</h2>
    <a href="restricted2.php">Restricted Page 2</a>
    <a href="logout.php">Logout</a>
<br>
<hr>
<div class="container my-5">
   <h2>List of World Cup 2022 Teams</h2>
   <a class="btn btn-primary" href="create.php" role="button">New Team</a>
   <br>
   <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Team Name</th>
        <th>Place(FIFA)</th>
        <th>Stage</th>
        <th>Total Market Value</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

    <?php

       $servername = "localhost";
       $username = "root";
       $password = "";
       $database = "site2database";

       $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
	       die("Connection failed: " . $connection->connect_error);
        }

    $sql = "SELECT * FROM teams";
    $result = mysqli_query($connection, $sql);

    if(!$result){
      die("Invalid query: " . $connection->error);
    }

    while($row = $result->fetch_assoc()){
        echo"
        <tr>
           <td>$row[idteam]</td>
           <td>$row[teamname]</td>
           <td>$row[place]</td>
           <td>$row[stage]</td>
           <td>$row[marketvalue]</td>
           <td>
               <a class='btn btn-primary btn-sm' href='edit.php?idteam=$row[idteam]'>Edit</a>
               <a class='btn btn-danger btn-sm' href='delete.php?idteam=$row[idteam]'>Delete</a>
           </td>
      
        </tr>
        ";
      }
      
        ?>
      
      </tbody>
    </table>
    </div>      

        
