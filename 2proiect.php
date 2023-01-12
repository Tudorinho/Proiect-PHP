<?php
  include_once 'header.php';
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>


<body>
<br>
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
      </tr>
    </thead>
    <tbody>

    <?php

       $servername = "sql306.epizy.com";
       $username = "epiz_33359487";
       $password = "BJDkylUy8cF";
       $database = "epiz_33359487_databaseproject";

       $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
	       die("Connection failed: " . $connection->connect_error);
        }

    $sql = "SELECT * FROM teams";
    $result = $connection->query($sql);

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


