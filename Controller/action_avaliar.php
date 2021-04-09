<?php
session_start();
include "conexao.php";
//Para que o Horário fique igual ao de Brasilia
date_default_timezone_set("America/Recife");
setlocale(LC_ALL, 'pt_BR');
$id 		= $_SESSION['id'];
$user 		= $_SESSION['user'];
$idPonto 	= $_GET['id'];
$estrela 	= $_POST['estrela'];
$_SESSION['estrela'] = $estrela;
$created 	= date_create();
$date 		= date_format($created, 'Y-m-d H:i:s');

		$star = ("SELECT user_id,ponto_id FROM avaliacoes WHERE user_id=? and ponto_id=? ");
		$consulta = $conn->prepare($star);
		$consulta->bindParam(1, $id);
		$consulta->bindParam(2, $idPonto);
	 	$stmt = $consulta->execute();
	 	
	 	if ($consulta->rowCount() >= 1) {
			$fetch 		= $consulta->fetch();
			$star 		= ("UPDATE avaliacoes SET qnt_estrela=?, modified=? WHERE user_id = $id");
			$queryTwo 	= $conn->prepare($star);	
			$queryTwo->bindParam(1, $estrela);	
			$queryTwo->bindParam(2, $date);	
			$stmt 		= $queryTwo->execute();	
		 	  header('Location: ../view_visualizar_pontos.php?id='.$idPonto);
	 	}else{
	 		$star 		= ("INSERT INTO avaliacoes (qnt_estrela, user_id, ponto_id) VALUES (?,?,?)");
	 		$queryTwo 	= $conn->prepare($star);	
			$queryTwo->bindParam(1, $estrela);	
			$queryTwo->bindParam(2, $id);	
			$queryTwo->bindParam(3, $idPonto);	
			$stmt 		= $queryTwo->execute();	

		 	  header('Location: ../view_visualizar_pontos.php?id='.$idPonto);
	 	}