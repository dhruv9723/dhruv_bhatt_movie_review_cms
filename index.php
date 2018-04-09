<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	require_once('admin/phpscripts/config.php');

	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== "") {
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill in the required fields";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">


</head>
<body>
    
    <?php
		include('includes/nav.html');
?>
    <div class="middle">
    <?php if(!empty($message)){echo $message;} ?>
	<form action="homepage.php" method="post">
		<label class="use">Username:</label>
		<input class="use2" type="text" name="username" value="">
		<br>
		<label class="use">Password:</label>
		<input class="use2" type="text" name="password" value="">
		<br>
		<input class="click" type="submit" name="submit" value="SUBMIT">
	</form>
    </div>
	
</body>
</html>