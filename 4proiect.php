<?php
include_once 'header.php';
$connect = mysqli_connect("sql306.epizy.com", "epiz_33359487", "BJDkylUy8cF", "epiz_33359487_databaseproject");
$sql = "SELECT * FROM teams";  
$result = mysqli_query($connect, $sql);
?>




 <head>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  

 
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Table with teams from World Cup 2022</h2><br/> 
    <table class="table table-bordered">
     <tr>  
                         <th>Team Name</th>  
                         <th>Place</th>  
                         <th>Stage</th>  
                         <th>Market Value</th>
    </tr>



     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["teamname"].'</td>  
         <td>'.$row["place"].'</td>  
         <td>'.$row["stage"].'</td>  
         <td>'.$row["marketvalue"].'</td>  
       </tr>  
        ';  
     }
     ?>




    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export to Excel" />
    </form>
   </div>  
  </div>  

