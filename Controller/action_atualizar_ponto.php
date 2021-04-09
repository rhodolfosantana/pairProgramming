<?php 
	session_start();
	$id = $_SESSION['id'];
 	require_once('conexao.php');

 
 	if(isset($_POST['nome_ponto']) && isset($_POST['id_ponto']) && isset($_POST['logradouro']) && isset($_POST['bairro']) && isset($_POST['descricao']) && isset($_FILES['imagem'])){
 		

 		$nome = htmlspecialchars($_POST['nome_ponto'], ENT_QUOTES);
		$logradouro =filter_var( $_POST['logradouro']);
		$bairro = htmlspecialchars($_POST['bairro'], ENT_QUOTES);
		$numero =filter_var($_POST['numero']);
		$categoria =filter_var($_POST['categoria']);
		$descricao = htmlspecialchars($_POST['descricao'], ENT_QUOTES);
		$id_ponto = $_POST['id_ponto'];

 		$nome = $_POST['nome_ponto'];
 		// $lat = $_POST['lat'];
 		// $lng = $_POST['lng'];
		$logradouro = $_POST['logradouro'];
		$bairro = $_POST['bairro'];
		$numero = $_POST['numero'];
		$categoria = $_POST['categoria'];
		$descricao = $_POST['descricao'];


		//Cadastrar imagem
		$imagem = $_FILES['imagem']; //arquivo enviado
		if(isset($imagem)){
			mkdir(__DIR__.'/../upload/', 0777, true);//Cria a pasta upload e se já existir não faz nada.
			$extensao  =  strtolower(substr($imagem['name'], -4));//pega as 4 ultimas letras do nome
			$novo_nome =  "imagem_".md5(time()).$extensao;//nome do arquivo salvo
			$diretorio =  "../upload/";//onde ele será salvo
			move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome);//mover o arquivo para o diretorio
		}	

 		
 		$sql = "UPDATE pontos_turisticos SET user_id=?, nome_ponto=?, logradouro=?, bairro=?, numero_ponto=?, imagem=?, categoria=?, descricao=? WHERE id = ?";
 		$query = $conn->prepare($sql);
		$query->bindParam(1, $id);
 		$query->bindParam(2, $nome);
		$query->bindParam(3, $logradouro);
		$query->bindParam(4, $bairro);
		$query->bindParam(5, $numero);
		$query->bindParam(6, $novo_nome);
		$query->bindParam(7, $categoria);
		$query->bindParam(8, $descricao);
		$query->bindParam(9, $id_ponto);

 		$stmt = $query->execute();
		header('Location: ../index.php');
	} else {

 		echo "<script>alert('erro')</script>";

 	}
	
  ?> 