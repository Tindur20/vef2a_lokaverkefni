<?php 	
	include "dbcon.php";		// gagnagrunnstenging
	include "dbqueries.php";    	// færslur
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lokaverkefni</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
	<div id="center">
	 	<?php 
	 	if (isset($_POST['email']) && $_POST['email'] != '' && $_POST['pass'] != '') {
	 		$email = $_POST['email'];
	 		$pass = hash('sha256', $_POST['pass']);
	 		$data = checkUser($conn, $email, $pass);
	 		echo $data['email'];
	 		statSession($data['email']);
	 	  }
		?>
		<form method="post" action="index.php">
			Email:
			<input type="email" name="email" required>
			Password:
			<input type="password" name="pass" required>
			<input type="submit">
		</form>
	</div>
</body>
</html>
