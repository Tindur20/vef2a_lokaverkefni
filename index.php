<?php 	
	include "dbcon.php";		// gagnagrunnstenging
	include "dbqueries.php";    	// færslur
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lokaverkefni</title>
	<?php require 'includes/head.php'; ?>
</head>
<body>

	<div class="navigation">
		<a href="register.php">Sign up</a>
	
	<div class="container">
	 	<?php 
	 	if (isset($_POST['email']) && $_POST['email'] != '' && $_POST['pass'] != '') {
	 		$email = $_POST['email'];
	 		$pass = hash('sha256', $_POST['pass']);
	 		$data = checkUser($conn, $email, $pass);
	 		echo $data['email'];
	 		startSess($data['email']);
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
	</div>

</body>
</html>
