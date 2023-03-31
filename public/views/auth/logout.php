<?php
session_start(); // start the session
session_unset(); // unset all session variables
session_destroy(); // destroy the session

// redirect the user to the home page with a success message
header("Location: http://localhost/isik?message=You have been disconnected."); 
exit(); // stop the script from executing any further
?>