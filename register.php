<!DOCTYPE html>
<?php 	
	include "dbcon.php";			// gagnagrunnstenging
	include "dbqueries.php";    	// færslur
?>
<html>
<head>
	<title>Sing up</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
	<div class="navigation">
		<a href="index.php">Sign up</a>
	
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
  
   
    <form method="post" action="index.php">
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