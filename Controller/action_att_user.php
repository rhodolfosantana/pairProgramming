<?php 
	include "conexao.php";
	session_start();
	$usuario = $_SESSION['user'];

	$nome = $_POST['nome'];
	$user = $_POST['user'];
	$pwd = $_POST['pwd'];

	$stmt = $conn->prepare("SELECT password FROM Users WHERE user = ?");
	$stmt->bindParam(1,$usuario);
	$stmt->execute();
	if ($stmt->rowCount()>=1){
		$update = $conn->prepare("UPDATE Users SET name=?,user=? WHERE user=?");
		$update->bindParam(1,$nome);
		$update->bindParam(2,$user);
		$update->bindParam(3,$usuario);
		$update->execute();
		$_SESSION['user']=$user;
		
		header("Location: /view_perfil.php");
	}
	else{
		header("Location: /view_perfil.php?pwderr");
	}


?>