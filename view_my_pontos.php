
<?php
  require_once('view_header.php');
  $query = $conn->prepare("SELECT * from pontos_turisticos WHERE user_id = ?");
  $query->bindParam(1,$_SESSION['id']);
  $query->execute();

  $mypontos = $query->fetchAll();
?>

<style type="text/css">
	img{
		max-width: 400px;
		padding-top: 30px;
		display: inline-block;
	}

	h3{
		margin-left: 10px;
		/*display: inline-block;*/
	}

	div.container{
		margin-top: 2em;
	}
</style>

	<div class="container" style="margin-top:  5em; padding-top: 2em; padding-bottom: 2em">
		<h1>Meus Pontos</h1>
		<?php foreach($mypontos as $ponto): ?>
			<div class="container panel panel-default">
				<a href="view_visualizar_pontos.php?id=<?=$ponto['id']; ?>"><img src="/upload/<?=$ponto['imagem'];?>"></a>
				<h3><?= $ponto['nome_ponto'];  ?> - <?= $ponto['bairro'];  ?></h3>
				<?php
					$id_user_ponto = $ponto['user_id'];
					$id_ponto = $ponto['id'];
				 ?>
				 <a href="view_atualizar_ponto.php?id=<?=$ponto['id']?>" class="btn btn-primary">Atualizar</a>
				<a href="Controller/action_apagar_ponto.php?id_user_ponto=<?= $id_user_ponto?>&ponto_id=<?= $id_ponto?>"><button class="btn btn-danger">Deletar</button></a>
				<br>
				<br>
			</div>
		<?php endforeach?>	
	</div>






<?php require_once 'view_footer.html'; ?>
