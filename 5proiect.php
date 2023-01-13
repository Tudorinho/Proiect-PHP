<?php
include_once 'header.php';

$conn = mysqli_connect("sql306.epizy.com", "epiz_33359487", "BJDkylUy8cF", "epiz_33359487_databaseproject");

$date = date("Y-m-d");  //returns date in YYYY-MM-DD format
$query = "SELECT * FROM stats where date=$date";
$result = mysqli_query($conn, $query);

if($result->num_rows==0){
    $insertQuery = "INSERT INTO stats (date) VALUES ($date)";
    mysqli_query($conn, $insertQuery);
}
else{
    $updateQuery = "UPDATE stats SET page_views=page_views + 1 WHERE date=$date";
    mysqli_query($conn, $updateQuery);
}


$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {
     echo "Number of visits: " . $row["page_views"]. " " ;
  }

?>
    
