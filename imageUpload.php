<?php 	
	include "dbcon.php";		// gagnagrunnstenging
	include "dbqueries.php";    	// færslur
?>
<?php 	
if (isset($_POST['upload']) && !empty($_FILES['image']['name'])) {
  try {
    $undirtexti = htmlspecialchars($_POST['undirtexti']);
    //$undirtexti = $_POST['undirtexti'];
    $naIid = getUserInfo($conn, $email);
    $id = $naIid['id'];
    addImage($conn, $undirtexti, $id);
} catch (Exception $e) {
echo $e->getMessage();
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Image Uploader</title>
	<?php require 'includes/head.php'; ?>
</head>
<body>
<div class="navigation">
	<a href="admin.php">home</a>
	<a href="logout.php">logout</a>
	<div class="container">
<h3>	virkar ekki    </h3>
		<form action="" method="post" enctype="multipart/form-data" id="uploadImage" class="from">
			Upload image:
			<input type="text" name="image" id="image">
			Bæta við texta undir myndina:
			<textarea name="undirtexti"></textarea>
			<input type="submit" name="upload" id="upload" value="Upload">
		</form>
</div>
</div>
</body>
</html>
