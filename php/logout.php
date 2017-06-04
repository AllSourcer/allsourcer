<?php
   session_start();
   //destroy the session and redirect the user to the login pag
   if(session_destroy()) {
      header("Location: signin.php");
   }
?>