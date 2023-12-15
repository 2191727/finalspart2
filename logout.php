<?php
    session_start();
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    // Prevent caching
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");

    header("Location: ./index.php");
    exit();
?>
