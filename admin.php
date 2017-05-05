<head>  
    <title>Heimasíða</title>
    <?php require 'includes/head.php'; ?>
</head>
<div class="navigation">
    <a href="logout.php">logout</a>
    <a href="imageUpload.php">Upload images</a>

<div class="container"> 
<?php
// Start the session
session_unset();
session_start();
if ($_SESSION['email']) {
 include 'dbcon.php';
 include 'dbqueries.php';
 $email = $_SESSION['email'];
}
else {
 header('Location: index.php');
}

 $user = getUserName($conn, $email);
 echo "Hello " . $user['name'] . "<br>";
 echo "email : " . $email . "<br>";
?>


<?php
 if (isset($_POST['name']) && $_POST['name']!='') {
 $name = $_POST['name'];
 changeUserName($conn, $email, $name);
 header("Refresh:0");
 }
 ?>
    <form method="post" action="admin.php">
     new name:
     <input type="name" name="name" required><br>
     <input type="submit">
    </form>

    <?php
  $id = getUserID($conn, $email);
  $myndir = getUserImages($conn, $id['id']);
  foreach ($myndir as $key => $value) {
    echo '<img class="myndir" src="' . $value['path'] . '" width="250" heigth="250"><br>';
    echo '<h3>'. $value['imageName'] . '</h3>';
    print_r($value);
  }
  ?>


</div>
</div>