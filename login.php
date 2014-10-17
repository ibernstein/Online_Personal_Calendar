<?php session_start();?>
<!DOCTYPE html>
    <html lang=en>
        <head>
            <title>Welcome to Your Calendar</title>
            <link rel="stylesheet" type="text/css" href="cal.css">
			<script type="text/javascript">
			//copy the create and navigate calendar here 
			</script> 
        </head>
        <body>
            <div>
            <form action=login.php method="post">
               Login with your username:<br>
			    <label for="username">Username</label>
                <input type="text" name="username" id= "username" maxlength="20">
				<label for="password">Password</label>
				<input type="password" name="password" maxlength="30">
                <input type="submit" name="submit" value="Login">               
            </form>
			</div>
        </body>
    </html>
	
<?php
require 'database.php';

if(isset($_POST['username'])&&isset($_POST['password'])){
	// Use a prepared statement 
	$stmt = $mysqli->prepare("SELECT COUNT(*), user_id, saltedpass FROM users WHERE username=?");


	// Bind the parameter 
	$stmt->bind_param('s' , $username);
	$username = $_POST['username'];
	$stmt->execute();
	
	// Bind the results
	$stmt->bind_result($cnt, $user_num, $pwd_hash);
	$stmt->fetch();
	 
	// Compare the submitted password to the actual password hash
	$pwd_guess = $_POST['password'];
	if( $cnt == 1 && crypt($pwd_guess, $pwd_hash)==$pwd_hash){
		// Login succeeded!
		$_SESSION['user_num'] = $user_num;
		header("Location: calendar");
		exit();
	}
	else{
		//login failed
		echo "Login failed. Try again.";
		header("Location: login.php");
	}
}
?>
         