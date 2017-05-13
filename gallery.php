<head>  
    <title>Heimasíða</title>
    <?php require 'includes/head.php'; ?>
</head>
<div class="navigation">
    <a href="admin.php">heimasíða</a>
    <a href="logout.php">logout</a>
 <div class="container">
<?php 
session_unset();
session_start();
if ($_SESSION['email']) {
 include 'dbcon.php';
 include 'dbqueries.php';
 $email = $_SESSION['email'];
}
else {
 header('Location: admin.php');
}
?>
<?php 
$info = getUserID($conn, $email);
$id = $info['id'];
$imageCounter = getAmountOfImages($conn, $id);
//set maximum 6 myndir séu sýndar.
define('SHOWMAX', 6);
  $siteOn = isset($_GET['sida']) ? $_GET['sida'] : 0;
  // calculate the start row of the subset
  $start = $siteOn * SHOWMAX;
  $images = getImages($conn, $id, $start, SHOWMAX);
  $CurrentImage = $_GET['image'];
?>
<main>
   <h2>Þínar myndir</h2>
   <p>Sýna <?php
   if ($start == 0 && $imageCounter[0] > 0) {
     echo "1";
   }
   else if ($imageCounter[0] == 0) {
     echo "0";
   }
   else {
     echo $start;
   }
   ?> til <?php
   if (SHOWMAX * ($siteOn +1) > $imageCounter[0]) {
     echo $imageCounter[0];
   }
   else {
       echo SHOWMAX * ($siteOn+1);
   }
 ?> af <?php echo $imageCounter[0]; ?></p>
   <div class="gallery">
     <table>
       <tr>
         <?php
         foreach ($images as $mynd) {
             echo "<td><a href=\"" . $_SERVER['PHP_SELF'] .'?sida=' . ($siteOn) .  "&image=" . $mynd['path'] . "\"><img src=\"" . $mynd['path'] . "\" ></a></td>";
         }
          ?>
       </tr>
     </table>
         <?php
     /*fæ vill hér utaf image er undefined index skil ekki af hverju það er*/ 

     $path = $_GET['image'];
      $imageInfo = getImageInfo($conn, $id, $path);
      ?>
   <figure id="main_image">
     <img src="<?php echo $path; ?>" alt="" class="selectedImage">
     <figcaption><?php echo $imageInfo['undirtexti']; ?></figcaption>
    </figure>
   </div>

	<?php
	// create a back link if current page greater than 0
	if ($siteOn > 0) {
	 echo '<a href="' . $_SERVER['PHP_SELF'] . '?sida=' . ($siteOn-1) . '&image=' . $CurrentImage .'"> &lt; Prev</a>';
	} else {
	 // otherwise leave the cell empty
	 echo '&nbsp;';
	}
	?>
	<?php
	// create a forward link if more records exist
	if ($start + SHOWMAX < $imageCounter) {
	 echo '<a href="'. $_SERVER['PHP_SELF'] . '?sida=' . ($siteOn-1) . '&image=' . $CurrentImage .'"> Next &gt;</a>';
	} else {
	 // otherwise leave the cell empty
	 echo '&nbsp;';
	}
	?>
</main>
</div>