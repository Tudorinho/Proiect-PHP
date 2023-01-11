<?php

$servername = "sql306.epizy.com";
$dBUsername = "epiz_33359487";
$dBPassword = "BJDkylUy8cF";
$dBName = "epiz_33359487_databaseproject";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
