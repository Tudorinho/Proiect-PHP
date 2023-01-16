<?php
session_start();

// unset all session variables
session_unset();

// destroy the session
session_destroy();

header('Location: home.php');
exit;
