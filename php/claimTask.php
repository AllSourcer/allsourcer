<?php
session_start();
//log anyone out if the person trying to access this page is not loged in already
if (!isset($_SESSION['user_id'])) {
	 header("Location: signin.php");
	 exit();
}
	require_once("connection.php");

		 if (isset($_POST['submit'])){
	         $errors = array();
	        if (isset($_POST['taskId'])) 
				$taskId = mysqli_real_escape_string($db,$_POST['taskId']);
			else $errors = "input type empty";

			$userId = $_SESSION['user_id'];
	            			//update the create task table with the user and the task just created
            			$taskClaimer = "insert into taskclaims(task_id,user_id) values('$taskId','$userId')";
            				if(mysqli_query($db,$taskClaimer))
            					echo "success claiming a task";
            				else {
						    echo "Error: " . $taskClaimer . "<br>" . mysqli_error($db);
						}

						mysqli_close($db);
	}

?>