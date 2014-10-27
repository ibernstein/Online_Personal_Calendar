<?php session_start();?>
<!DOCTYPE html>
    <html lang=en>
        <head>
            <title>Welcome to Your Calendar</title>

             <!-- Bootstrap core CSS -->
   			<link href="core.css" rel="stylesheet">

   			 <!-- Custom styles for this template -->
    		<link href="signinstyle.css" rel="stylesheet">
			<script type="text/javascript">
			//copy the create and navigate calendar here 
			</script> 
        </head>
        <body>

        	   <div class="container">

			      <form class="form-signin" action="login.php" method="post">
			        <h2 class="form-signin-heading">Login with your username:</h2>
			        <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
			        <input type="password"  name="password"class="form-control" placeholder="Password" required>
			        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			      </form>

			    </div>
        	   <div class="container2">

			      <form class="form-signup" action="signup.php" method="post">
			        <h2 class="form-signup-heading">Signup with a new username:</h2>
			        <input type="username" name="newusername" class="form-control" placeholder="Username" required autofocus>
			        <input type="password"  name="newpassword" class="form-control" placeholder="Password" required>
			        <input type="password"  name="repeatpassword" class="form-control" placeholder="Retype Password" required>
			        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
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
		header("Location: calendar.html");
	}
}
?>