<?php

session_start();
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false || !isset($_SESSION['admin']) || $_SESSION['admin'] == false) {
//     header('Location: home.php');
//     exit;
// }

if (!isset($_SESSION['admin']) || $_SESSION['admin'] == false) {
    // redirect the user or display an error message
    die("You are not authorized to access this page.");
  }

if (isset($_GET["idteam"])) {

    $idteam = $_GET["idteam"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "site2database";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM teams WHERE idteam=$idteam";
    $connection->query($sql);

}


header("location: restricted1.php");
exit;

?>