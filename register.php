<!DOCTYPE html>
<?php 	
	include "dbcon.php";			// gagnagrunnstenging
	include "dbqueries.php";    	// færslur
?>
<html>
<head>
	<title>Sign up</title>
	<?php require 'includes/head.php'; ?>
</head>
<body>
	<div class="navigation">
		<a href="index.php">Login</a>
	
<div class="container">
  <?php
      if (isset($_POST['name']) && $_POST['name']!='' && $_POST['email'] !='' && $_POST['pass'] !='') {
        $name = $_POST['name'];
        $email = $_POST['email'];
         //breytir passwordinu frá t.d. admin123 í 146a7492719b3564094efe7abbd40a7416fd900179d02773 
        $pass = hash('sha256', $_POST['pass']);
        addUser($conn, $name, $email, $pass);
        $id = getUserID($conn, $email);
        header('location: index.php');
      }
   ?>
  
   
    <form method="post" action="register.php">
	     	name:
	    	<input type="text" name="name" required>
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