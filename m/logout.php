<?php 
/* Start the session */
session_start();
/* remove all session variables */
session_unset();
/* destroy the session */
session_destroy();
header("Location:".$base_url."login.php"); 
exit;
?>