<?php  
//export.php  
$connect = mysqli_connect("sql306.epizy.com", "epiz_33359487", "BJDkylUy8cF", "epiz_33359487_databaseproject");
$output = '';


if(isset($_POST["export"]))
{
 $query = "SELECT * FROM teams";
 $result = mysqli_query($connect, $query);


 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
   <tr>  
   <th>Team Name</th>  
   <th>Place</th>  
   <th>Stage</th>  
   <th>Market Value</th>
   </tr>
  ';

  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["teamname"].'</td>  
                         <td>'.$row["place"].'</td>  
                         <td>'.$row["stage"].'</td>  
                         <td>'.$row["marketvalue"].'</td>  
    </tr>
   ';
  }


  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }


}


?>