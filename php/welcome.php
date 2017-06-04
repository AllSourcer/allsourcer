<?php
session_start(); // Start the session.
require_once("connection.php");
 // If no session value is  present,
if (!isset($_SESSION['user_id'])) {
 header("Location: signin.php");
 exit();
}
else {
	
	//you are loged in 
	 $page_title = 'Logged In!';
	//log out page link
	 echo "<p><a href=\"logout.php\">Logout</a></p>";

	 //display the tasks that exist on the dashboard
	 $query = "select * from tasks";

	 $status = mysqli_query($db,$query);
	if(!$status)
		die("task query failed"). mysqli_error();
	$row = mysqli_fetch_array($status,MYSQLI_ASSOC);
	print_r($row);

	mysqli_close();

}