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
  function getUserImages($conn, $id){
  	$sql = "SELECT path, imageName FROM myndir WHERE userID = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $id);
    $query->execute();
    $results = $query->fetchAll();
    return $results;
  }
  function addImageToUser($conn, $id){
  $sql = 'INSERT INTO myndir VALUES (:id, "myndir/mynd1.jpg", "Þetta er Mynd 1"),(:id, "myndir/mynd2.jpg", "Þetta er Mynd 2"),(:id, "myndir/mynd3.jpg", "Þetta er Mynd 3")';
  $query = $conn->prepare($sql);
  $query->bindParam(":id", $id);
  $query->execute();
  }
 function deleteImage($conn, $id, $path){
   $sql = "DELETE FROM myndir WHERE userID = ? AND path = ?";
   $query = $conn->prepare($sql);
   $query->bindParam(1, $id);
   $query->bindParam(2, $path);
   $query->execute();
 }
 ?>