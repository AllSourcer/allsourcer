<?php
   session_start();
   //destroy the session and redirect the user to the login page
   if(session_destroy()) {
      header("Location: login.php");
   }
?>