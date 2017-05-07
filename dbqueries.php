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
  //virkar ekki í augnablikinu
  
 function getUserImages($conn, $id){
 	$sql = "SELECT path, imageName FROM myndir WHERE userID = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $id);
    $query->execute();
    $results = $query->fetchAll();
    return $results;
  }
  function addImageToUser($conn, $id){
  $sql = 'INSERT INTO myndir(imageName, path, userID) VALUES ("Þetta er Mynd 1","myndir/kissa_1.jpg",:id),("Þetta er Mynd 2","myndir/kissa_2.jpg",:id),("Þetta er Mynd 3","myndir/kissa_3.jpg",:id), ("Þetta er Mynd 4","myndir/kissa_4.jpg",:id)';
  $query = $conn->prepare($sql);
  $query->bindParam(":id", $id);
  $query->execute();
  }
function addImage($conn, $undirtexti, $path, $userid){
  $sql= "INSERT INTO myndir(users_id, slod, undirtexti) VALUES (?, ?, ?)";
  $query = $conn->prepare($sql);
  $query->bindParam(1, $userid);
  $query->bindParam(2, $path);
  $query->bindParam(3, $undirtexti);
  $query->execute();
}
function getImages($conn, $userid, $startPosition, $maximum){
  $sql = "SELECT * FROM myndir WHERE users_id = :id ORDER BY path";
  $query = $conn->prepare($sql);
  $query->bindValue(':id', $userid);
  $query->execute();
  $results = $query->fetchAll();
  return $results;
}
 ?>