<?php
session_start();
//log anyone out if the person trying to access this page is not loged in already
if (!isset($_SESSION['user_id'])) {
 header("Location: signin.php");
 exit();
}
//create a task
require_once("connection.php");

	 if (isset($_POST['submit'])){
         $errors = array();
        if (isset($_POST['type'])) 
			$type = mysqli_real_escape_string($db,$_POST['type']);
		else $errors = "input type empty";
		if (isset($_POST['title'])) 
      		$title = mysqli_real_escape_string($db,$_POST['title']); 
      	else $errors = "you have not entered title";

      	if (isset($_POST['description'])) 
     		 $description = mysqli_real_escape_string($db,$_POST['description']);
     	else $errors= "you have not entered description";
     	if (isset($_POST['price'])) 
     		 $price = mysqli_real_escape_string($db,$_POST['price']);
     	else $errors= "you have not entered price";


     	if (isset($_POST['filter_id'])) 
      		$filter_id = mysqli_real_escape_string($db,$_POST['filter_id']); 
      	else $errors = "you have not entered filter id";

      		if(!empty($errors)){
      			echo "eroor 101";
            // for ($i=0; $i < count($errors); $i++) { 
            // 	echo $errors[$i];
            // }
      		}

      		


      		else{
				
					$query = "insert into  tasks(filter_id,type,description,price) values('$filter_id','$type','$description','$price')";
					
					

				      if (mysqli_query($db, $query)) {
						    echo "New task created successfully";
						} else {
						    echo "Error: " . $query . "<br>" . mysqli_error($db);
						}
						//get the id of the last inserted task  and   put it into the task creator table to mark a relationship
					$taskId = "SELECT * FROM tasks ORDER BY id DESC LIMIT 1";

						$result = mysqli_query($db,$taskId);
						if(!$result)
                			die(" data base query failed"). mysqli_error();
            			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            			$tId = $row['id'];
            				$userId = $_SESSION['user_id'];
            			//update the create task table with the user and the task just created
            			$taskCreator = "insert into taskcreators(task_id,user_id,created_at) values('$tId','$userId',".now().")";
            				if(mysqli_query($db,$taskCreator))
            					echo "success creating creator";
            				else {
						    echo "Error: " . $taskCreator . "<br>" . mysqli_error($db);
						}

						mysqli_close($db);
				echo "inserted";
     // header("Location: signin.php");
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> create task</title>
</head>
<body>
<form method="post" action="createTask.php">
	Type:
	<input name ="type" type="text"></input><br/>
	Title:
	<input name="title" type="text" ></input><br/>
	Description:
	<input name="description" type="text" required="true"></input><br/>
	Price
	<input name="price" type="text" required="true"><br/>
	Filter:
	<input name="filter_id" type="text" required ><br/>
	<input type="submit" name="submit"></input>
</form>

</body>
</html>