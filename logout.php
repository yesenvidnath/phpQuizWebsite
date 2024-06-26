<?php
session_start();

// Destroy the session
session_destroy();

// Redirect the user to the Home page
header("Location: index.php");
exit;


?>