<?php 
	session_start();

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "shoutit");
	
	    if (isset($_POST['register_btn'])) {
			
			
			$username = addslashes( $_POST['username'] ); //prevents types of SQL injection
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password2 = $_POST['password'];
	
		/*
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		*/
		if (empty($_POST["name"])) {
				$_SESSION['message'] = "fill requirements";
		}
				if (empty($_POST["email"])) {
				$_SESSION['message'] = "fill requirements";
				}
				if (empty($_POST["password"])) {
				$_SESSION['message'] = "fill requirements";
				}
				if (empty($_POST["password2"])) {
				$_SESSION['message'] = "fill requirements";
				}
			
		else{
			if ($password == $password2) {
			// create user
			$password = md5($password); //hash password before storing for security purposes
			$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: index.php"); //redirect to home page
			}
			else{ 
			$_SESSION['message'] = "The two passwords do not match";
			}
			
		}
		
		
	/*
			if ($password == $password2) {
			// create user
			$password = md5($password); //hash password before storing for security purposes
			$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: index.php"); //redirect to home page
			}
			
			
			
			else{ 
			$_SESSION['message'] = "The two passwords do not match";
			}
		*/
		}
		
?>



<!DOCTYPE html>
<html>
<head>
	<title>Register, login and logout user php mysql</title>
	<link rel="stylesheet" type="text/css" href="css/new.css">
</head>
<body>
<br>
<br>
<br>
<br>
<br>

<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}

?>

<form method="post" action="register.php">
<div class="header"> 
	<h1><img src="icon.png" style="width:70px;height:60px;"> &nbsp;Create your Account</h1>
</div>
	<table>
	&nbsp;
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email" class="textInput"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input type="password" name="password2" class="textInput"></td>
		</tr>
	</table>
	
	<center><input type="submit" name="register_btn" value="Register"></center>
	&nbsp;
</form>
</body>
</html>