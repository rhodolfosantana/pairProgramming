<?php
session_start();
include "conexao.php";

if($_POST['nome'] != null && $_POST['user'] != null && $_POST['email'] != null && $_POST['pass'] != null && $_POST['senha2']!=null && $_POST['pass'] == $_POST['senha2']){
	
	
	$nome = htmlspecialchars($_POST['nome'],ENT_QUOTES);
	$user = htmlspecialchars($_POST['user'],ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'],ENT_QUOTES);
	$pass = sha1($_POST['pass']);

	$checking=("SELECT * FROM Users WHERE user = ?");

	$queryOne = $conn->prepare($checking);
	$queryOne->bindParam(1,$user);
	$queryOne -> execute();

	$stmt = $queryOne->fetch();

	if ($stmt[0] != null){

		$_SESSION['cadastro_falhou']=true;
		header('location:../index.php');

	} else {

		$sql = "INSERT INTO Users(name, email, user, password) VALUES (?, ?, ?,?)";
		$query = $conn->prepare($sql);
		$query->bindParam(1, $nome);
		$query->bindParam(2, $email);
		$query->bindParam(3, $user);
		$query->bindParam(4, $pass);
		$stmt = $query->execute();
		$_SESSION['emailCadastro'] = $_POST['email'];
		$_SESSION['nomeCadastro'] = $_POST['nome'];

		$_SESSION['cadastro_sucesso'] = true;
var_dump($stmt);
		header('location: email.php');	
	}	

}else {
	$_SESSION['fail_campo']=true;
	header('location:../index.php');
}

?>