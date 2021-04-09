<?php

 	
include('conexao.php');

if (isset($_POST["search"])){
	$dado = $_POST["search"];

	$output = '';



	$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");

	$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");

	$queryOne = $conn->prepare($checking);
	$queryOne->bindValue(':pesquisa', '%'.$dado.'%');
	$return = $queryOne -> execute();
	
	
		$stmt = $queryOne->fetchAll();
		$output = '<ul class="listas_result" style="list-style-type:none;">';
		if ($stmt!=null){
		
		
		for ($i = 0; $i < sizeof($stmt); $i++){
			$output .= '<li>''<a>'.$stmt[$i]['nome_ponto'].'</a>''</li>';
		
		}
	}
		else { 
			$output .= '<li> nada encontrado</li>';
	
	}
	$output .= '</ul>';
	echo $output;
}

?>
