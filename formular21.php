<?php
  include_once 'header.php';
?>

<main>
      <p>SEND E-MAIL</p>
      <form class="contact-form" action="formular22.php" method="post">
        <input type="text" name="name" placeholder="Full name">
        <input type="text" name="mail" placeholder="Your e-mail">
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit" name="submit">SEND MAIL</button>
      </form>
</main>