<?php
  function addUser($conn, $name, $email, $password){
  	$sql = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $name);
    $query->bindParam(2, $email);
    $query->bindParam(3, $password);
    $query->execute();
  }
  function getUser($conn, $email, $password){
  	$sql = "SELECT email, password FROM users WHERE email = ? AND password = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $email);
    $query->bindParam(2, $password);
    $query->execute();
    $results = $query->fetch();
    return $results;
  }
  function checkUser($conn, $email, $password){
  	$sql = "SELECT email, password FROM users WHERE email = ? AND password = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $email);
    $query->bindParam(2, $password);
    $query->execute();
    $results = $query->fetch();
    return $results;
}
  function startSess($email){
    session_unset();
    session_start();
    $_SESSION["email"] = $email;
    header('location: admin.php');
  }
  function getUserName($conn, $email){
  	$sql = "SELECT name FROM users WHERE email = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $email);
    $query->execute();
    $results = $query->fetch();
    return $results;
  }
  function changeUserName($conn, $email, $name){
  	$sql = "UPDATE users SET name = ? WHERE email = ?";
    $query =$conn->prepare($sql);
    $query->bindParam(1, $name);
    $query->bindParam(2, $email);
    $query->execute();
  }
  function getUserID($conn, $email){
  	$sql = "SELECT id FROM users WHERE email = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $email);
    $query->execute();
    $results = $query->fetch();
    return $results;
  }
  function getAmountOfImages($conn, $userid){
  $sql = "SELECT COUNT(*) FROM myndir WHERE userID = ?";
  $query = $conn->prepare($sql);
  $query->bindParam(1, $userid);
  $query->execute();
  $result = $query->fetch();
  return $result;
}
 function getUserImages($conn, $id){
 	$sql = "SELECT path, imageName FROM myndir WHERE userID = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $id);
    $query->execute();
    $results = $query->fetchAll();
    return $results;
  }
    function getImageInfo($conn, $userid, $path){
  $sql = "SELECT * FROM myndir WHERE userID = ? AND path = ?";
  $query = $conn->prepare($sql);
  $query->bindParam(1, $userid);
  $query->bindParam(2, $path);
  $query->execute();
  $results = $query->fetch();
  return $results;
}
  function addImageToUser($conn, $id){
  $sql = 'INSERT INTO myndir(imageName, path, userID) VALUES ("Þetta er Mynd 1","myndir/kissa_1.jpg",:id),("Þetta er Mynd 2","myndir/kissa_2.jpg",:id),("Þetta er Mynd 3","myndir/kissa_3.jpg",:id), ("Þetta er Mynd 4","myndir/kissa_4.jpg",:id)';
  $query = $conn->prepare($sql);
  $query->bindParam(":id", $id);
  $query->execute();
  }
<<<<<<< HEAD
function addImage($conn, $undirtexti, $path, $userid){
  $sql= "INSERT INTO myndir(userID, slod, undirtexti) VALUES (?, ?, ?)";
  $query = $conn->prepare($sql);
  $query->bindParam(1, $userid);
  $query->bindParam(2, $path);
  $query->bindParam(3, $undirtexti);
  $query->execute();
}
function getImages($conn, $userid, $startPosition, $maximum){
  $sql ="SELECT * FROM myndir WHERE userID = :id ORDER BY path DESC LIMIT :start, :stop";
   $query = $conn->prepare($sql);
  $query->bindValue(':id', $userid);
  $query->bindValue(':start', (int) $startPosition, PDO::PARAM_INT);
  $query->bindValue(':stop', (int) $maximum, PDO::PARAM_INT);
  $query->execute();
  $results = $query->fetchAll();
  return $results;
}
 ?>
=======
 ?>
>>>>>>> fe57cced9559591699148a4b0927a4f08c436639
