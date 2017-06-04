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
            			$taskClaimer = "insert into taskclaims(task_id,user_id,created_at) values('$taskId','$userId',now())";
            				if(mysqli_query($db,$taskClaimer))
            					echo "success claiming a task";
            				else {
						    echo "Error: " . $taskClaimer . "<br>" . mysqli_error($db);
						}



						//select the creator of this task to be claimed by the claimer
						// $creator = "Select * from user where taskcreators.task_id ='$taskId' and taskcreator.user_id =user_id";
						// if(mysqli_query($db,$creator))
      //       					echo "success claiming a task";
      //       				else {
						//     echo "Error: " . $creator . "<br>" . mysqli_error($db);
						// }
						// $row = mysqli_fetch_array($status,MYSQLI_ASSOC);
						


						mysqli_close($db);
	}

?>