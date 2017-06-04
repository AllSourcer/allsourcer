<?php
require_once("connection.php");

	 if (isset($_POST['submit'])){
         $errors = array();
        if (isset($_POST['email'])) 
			$email = mysqli_real_escape_string($db,$_POST['email']);
		else $errors = "input email empty";
		if (isset($_POST['password'])) 
      		$password = mysqli_real_escape_string($db,$_POST['password']); 
      	else $errors = "you have not entered password";

      	if (isset($_POST['name'])) 
     		 $name = mysqli_real_escape_string($db,$_POST['name']);
     	else $errors= "you have not entered user name";
     	if (isset($_POST['phone'])) 
     		 $phone = mysqli_real_escape_string($db,$_POST['phone']);
     	else $errors= "you have not entered phone number";


     	if (isset($_POST['passwordConfirm'])) 
      		$confirmPass = mysqli_real_escape_string($db,$_POST['passwordConfirm']); 
      	else $errors = "you have not entered comfirm password";
      		if (!empty($errors)) {
      			foreach ($errors as $key ) 
               		echo $key;
      		}
      		else{
				if (strcmp($password,$confirmPass)==0) {
					$query = "insert into  users(name,email,password,phone) values('$name','$email','$password','$phone')";
					//$query = "INSERT  INTO users(name,email,password,phone) VALUES("'.$email.'","'. $password .'","'. $phone.'","'.$name.'")";
				      if (mysqli_query($db, $query)) {
						    echo "New record created successfully";
						} else {
						    echo "Error: " . $query . "<br>" . mysqli_error($db);
						}

						mysqli_close($db);
			
				    header("Location: signin.php");
				}
				else{
					echo "Passwords did not match";
				}
			}
	}

?>
<!DOCTYPE html>
<html>
<head>
   <title>Sign Up </title>
</head>
<body>
<form method="post" action="signup.php">
	Name:
	<input type="text" name="name" required="true"></input><br/>
	Email:
	<input type="text" name="email" required="true"></input><br/>
	Phone Number:
	<input type="text" name="phone" required="true"></input><br/>

	Password:
	<input type="password" name="password" ></input><br/>
	Confirm Password:
	<input type="password" name="passwordConfirm" ></input>
	<input type="submit" name="submit"></input>
</form>

</body>
</html>