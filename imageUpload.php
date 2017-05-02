<?php 	
	include "dbcon.php";		// gagnagrunnstenging
	include "dbqueries.php";    	// færslur
?>
<?php
 // set the maximum upload size in bytes
 $max = 51200;
 if (isset($_POST['upload'])) {
 // define the path to the upload folder
 $destination = 'H:/onn_4/vef2a/lokaverkefni/upload_test';
 // move the file to the upload folder and rename it
 move_uploaded_file($_FILES['image']['tmp_name'],
 $destination . $_FILES['image']['name']);
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Image Uploader</title>
	<?php require 'includes/head.php'; ?>
</head>
<body>
	<div>

		<form action="" method="post" enctype="multipart/form-data" id="uploadImage">
			Upload image:
			<input type="file" name="image" id="image">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?= $max; ?>">
			<input type="submit" name="upload" id="upload" value="Upload">

		</form>
		<pre>
 <?php
 if (isset($_POST['upload'])) {
 print_r($_FILES);
 }
 ?>
 </pre>
	</div>
</body>
</html>
