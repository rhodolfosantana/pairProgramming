<?php 
 	require_once('conexao.php');
	session_start();

 	if(isset($_FILES['imagem'])){
 		
 		$ponto_id = $_GET['ponto_id'];
		//Cadastrar imagem
		$imagem = $_FILES['imagem']; //arquivo enviado
		if(isset($imagem)){
			mkdir(__DIR__.'/../img/', 0777, true);//Cria a pasta upload e se já existir não faz nada.
			$extensao  =  strtolower(substr($imagem['name'], -4));//pega as 4 ultimas letras do nome
			$novo_nome =  "imagem_".md5(time()).$extensao;//nome do arquivo salvo
			$diretorio =  "../img/";//onde ele será salvo
			move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome);//mover o arquivo para o diretorio
		}	

 		
 		$sql = "INSERT INTO imagens (img, ponto_id) 
						VALUES(?, ?)";
 		$query = $conn->prepare($sql);
		$query->bindParam(1, $novo_nome);
 		$query->bindParam(2, $ponto_id);
 		$stmt = $query->execute();
		header("Location: ../view_visualizar_pontos.php?id=$ponto_id");
	} else {
 		echo "Erro!!";
 	}
	
  ?> 