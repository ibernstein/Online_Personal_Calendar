<?php session_start(); ?>
 <?php
	require 'database.php';
	
	if(isset($_POST['newusername'])&&isset($_POST['newpassword'])&&isset($_POST['repeatpassword'])){
		$new_user = $_POST['newusername'];
		
		if($_POST['newpassword'] == $_POST['repeatpassword']){
			$new_password = crypt($_POST['newpassword']);
			$stmt = $mysqli->prepare("insert into users (username, saltedpass) values (? , ?)");
			if(!$stmt){
				printf("Query Prep Failed: %s\n", $mysqli->error);
				header('signupfail.php');
			}
			else{
				$stmt->bind_param('ss', $new_user, $new_password);
				$stmt->execute();
				$stmt->close();
			//log in the new user!	
				
				
				// Use a prepared statement 
				$stmt = $mysqli->prepare("SELECT COUNT(*), user_id, saltedpass FROM users WHERE username=?");

				// Bind the parameter 
				$stmt->bind_param('s' , $username);
				$username = $new_user;
				$stmt->execute();
				// Bind the results
				$stmt->bind_result($cnt, $user_num, $pwd_hash);
				$stmt->fetch();
				$_SESSION['user_num'] = $user_num;
				header("Location: calendar.html");
				exit();

			}	
			
		}
		else{ 
			header("Location: signupfail.html");
			exit();
		}
	}
?>