<?php 
	if (!isset($_SESSION['user'])){
		header('Location: index.php');
		exit();
	}
	$user = $_SESSION['user'];
	require_once 'Controller/conexao.php';
	$stmt = $conn->prepare("SELECT name,user FROM Users where user=?");
	$stmt->bindParam(1,$user);
	$stmt->execute();
	$dados = $stmt->fetch();
?>
	<style type="text/css">
		#corpo{
 		 height: 1000px;
		 margin-top: 6em;
		}
		div#dados{
 		 margin-top: 70px;
		}
	</style>


	<div id="corpo" class="container">
		<h1>Perfil <span class="glyphicon glyphicon-user"></span></h1>
		<div id="dados">
			<?php if(isset($_GET['att'])):?>
				<h3>Atualize seus dados</h3><br>
	
				<form class="form-horizontal" action="Controller/action_att_user.php" method="POST">
					<div class="form-group">
				      <label class="control-label col-sm-2" for="nome">Nome:</label>
				      <div class="col-sm-10">          
				        <input type="text" class="form-control" id="nome"  name="nome" value="<?=$dados['name']?>">
				      </div>
				    </div>


				    <div class="form-group">
				      <label class="control-label col-sm-2" for="user">Usuario:</label>
				      <div class="col-sm-10">          
				        <input type="text" class="form-control" id="user"  name="user" value="<?=$dados['user']?>">
				      </div>
				    </div>
				    
				    <div class="form-group">
				      <label class="control-label col-sm-2" for="pwd">Senha:</label>
				      <div class="col-sm-10">          
				        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
				      </div>
				    </div>
				    
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				        <button type="submit" class="btn btn-default">Atualizar</button>
				      </div>
				    </div>
				</form>
					

			<?php else:?>
		<h3>Seus Dados </h3>
			<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Nome</th>
			        <th>Usuário</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td><?=$dados['name']?></td>
			        <td><?=$dados['user']?></td>
			      </tr>
			      
			    </tbody>
			</table>
			<a href="view_perfil.php?att"><button class="btn-primary btn">Alterar Dados</button></a>
			<?php endif ?>
	</div>
	</div>

<?php 
	
	require_once('view_footer.html');

 ?>