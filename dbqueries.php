<?php 
Function addUser($conn, $name, $email, $pass){
	$sql = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";
	$query = $conn->prepare($sql);
	$query->bindparam(1, $name);
	$query->bindparam(2, $email);
	$query->bindparam(3, $pass);
	$query->execute();
}

function checkUser($conn, $email, $pass){
    $sql = "SELECT email, password FROM users WHERE email = ? AND password = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $email);
    $query->bindParam(2, $pass);
    $query->execute();
    $results = $query->fetch();
    return $results;
}

function startSession($email){
    session_unset();
    session_start();
    $_SESSION["email"] = $email;
    header('location: admin.php');
}

function getUserID($conn, $e){
	$sql = "SELECT id FROM users WHERE email = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $e);
    $query->execute();
    $results = $query->fetch();
    return $results;
}

 function getUsername($conn, $email){
    $sql = "SELECT name FROM users WHERE email = ?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $email);
    $query->execute();
    $results = $query->fetch();
    return $results;
  }

function changeUsername($conn, $email, $name){
    $sql = "UPDATE users SET name = ? WHERE email = ?";
    $query =$conn->prepare($sql);
    $query->bindParam(1, $name);
    $query->bindParam(2, $email);
  	$query->execute();
}
?>
