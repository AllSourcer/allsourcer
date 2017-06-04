<?php
session_start(); // Start the session.

 // If no session value is  present,
if (!isset($_SESSION['id'])) {
 header("Location: signin.php");
 exit();
}
else {
//you are loged in 
 $page_title = 'Logged In!';
//log out page link
 <p><a href="logout.php\">Logout</a></p>";
}