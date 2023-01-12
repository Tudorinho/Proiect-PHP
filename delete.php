<?php
  include_once 'header.php';
?>



<?php

if (isset($_GET["idteam"])) {

    $idteam = $_GET["idteam"];

    $servername = "sql306.epizy.com";
    $username = "epiz_33359487";
    $password = "BJDkylUy8cF";
    $database = "epiz_33359487_databaseproject";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM teams WHERE idteam=$idteam";
    $connection->query($sql);

}


header("location: 2proiect.php");
exit;

?>