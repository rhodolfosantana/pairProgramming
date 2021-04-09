<?php

require_once 'view_header.php';

include('conexao.php');
?>
<style type="text/css">
	.resultados{
		margin-top: 5em;
  		margin-bottom: 7em;
	}
	img{
		max-width: 400px;
	}

	div.panel{
		padding-bottom: 20px;
	}
</style>

<div class="container resultados">
	<h1 style="padding-bottom: 30px;">Todos os resultados:</h1>
	<?php
		if (isset($_POST["search"])){
			$dado = $_POST["search"];

			$output = '';



			$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");

			$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");

			$queryOne = $conn->prepare($checking);
			$queryOne->bindValue(':pesquisa', '%'.$dado.'%');
			$return = $queryOne -> execute();
			
			
				$stmt = $queryOne->fetchAll();
				if ($stmt!=null){
				
				
				for ($i = 0; $i < sizeof($stmt); $i++){
					$id = $stmt[$i]['id'];
					$output .= "<a href='view_visualizar_pontos.php?id=$id'>";
					$output .= '<div class="container panel panel-default">';
					$output .= '<h3>'.$stmt[$i]['nome_ponto']." - ". $stmt[$i]['bairro'].'</h3>';
					$imagem = $stmt[$i]['imagem'];
					$output .= "<img src='upload/$imagem'></img>";
					$output .= '</div></a>';
				
				}
			}
				else { 
					$output .= '<div class="container panel panel-default">';
					$output .= '<h3> Nada Encontrado</h3>';
					$output .= '</div>';
			
			}
			echo $output;
		}
?>
</div>






<?php include 'view_footer.html';?>

