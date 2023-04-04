<?php
session_start();
session_unset(); 
session_destroy(); 
header("Location: http://localhost/isik?message=vous avez été déconnecté."); 
exit(); 
?>