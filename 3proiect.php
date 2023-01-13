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
// Now we will try to get the first 10 'h3' elements of the 'content' tag
// In this case, we will return the first 10 editions of the World Cup
$i = 0;
foreach ($h3 as $x) {
  $i++;
  if ($i == 10) {
    break;
  }
  $text = $x->textContent;
  echo trim( $text, "[modificare | modificare sursă]");
  // Normal pe wikipedia apare si cu modificare sursa, vrem sa ramana doar continutul legat de Campionatul Mondial
  echo "<br>";
  // lasam spatiu intre editiile de Cupa Mondiala
}


?>

<body style="background-color: #ffffff">
