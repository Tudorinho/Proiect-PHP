<?php
  include_once 'header.php';
?>

<h2>Anul si locul unde s-au desfasurat primele 10 editii de la Cupa Mondiala</h2>

<?php


// Send a GET request to get the html input from another website

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ro.wikipedia.org/wiki/Campionatul_Mondial_de_Fotbal');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$html = curl_exec($ch);

$dom = new DOMDocument();
@ $dom->loadHTML($html);

$divMwContentText = $dom->getElementById('content');

$h3 = $divMwContentText->getElementsByTagName('h3');

$i = 0;
foreach ($h3 as $x) {
  $i++;
  if ($i == 10) {
    break;
  }
  $text = $x->textContent;
  echo trim( $text, "[modificare | modificare sursă]");
  echo "<br>";
}


?>

<body style="background-color: #ffffff">
