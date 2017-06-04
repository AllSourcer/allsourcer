<?php
  session_start();
   include("connection.php");
 
   
      
       if (isset($_POST['submit'])){
         $errors = array();
         if (isset($_POST['email']))
            $email = mysqli_real_escape_string($db,$_POST['email']);
         else $errors = "please input user email";

         if (isset($_POST['password']))
            $password = mysqli_real_escape_string($db,$_POST['password']); 
         else $errors = "please input password";

         if(!empty($errors)){
            foreach ($errors as $key ) 
               echo $key;
            }
         else{
            
            $query = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
            $result = mysqli_query($db,$query);
               if(!$result)
                die("data base query failed"). mysqli_error();
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            $count = mysqli_num_rows($result);
            
            mysqli_close();
            // if there is a match
      		
            if($count == 1) {
               $_SESSION['user_id'] = $row['id'];
               $_SESSION['username'] =$row['name'];
               $_SESSION['login_user'] = $row['email'];
               $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
               
             header("location: welcome.php");
            }else {
              echo "Login Name or Password is invalid";
            }
         }
      }
 
?>
<!DOCTYPE html>
<html>
<head>
   <title>log in </title>
</head>
<body>
<form method="post" action="signin.php">
   Email:
   <input type="email" name = "email" placeholder="email"></input><br/>
   Password:
   <input type="password" name="password" placeholder="password"></input><br/>
   <input type="submit" name="submit"></input>
  

</form>
</body>
</html>