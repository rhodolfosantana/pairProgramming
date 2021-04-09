<?php 
require_once('Controller/conexao.php');

//require_once('toninho/toninho.php');
$consulta = $conn -> query("SELECT id, nome_ponto, logradouro, bairro, imagem FROM pontos_turisticos ORDER BY id DESC;"); 
session_start();
require_once('toninho/toninho_login.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Application</title>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css"> -->
	<link rel="stylesheet" type="text/css" href="estilos/index-style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="icon" type="image/png" href="images/icon.png">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<!-- Barra superior -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<!-- Bootstrap core CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
</head>
<body>

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Ubuntu');
		*{
		}
		#titulo_pontos{
			margin-top: 30px;
			font-family: 'Ubuntu', cursive;
			font-size: 30pt;
            text-shadow: 1.5px 1.5px 1.5px;
		}

		#listagem_pontos {
			font-family: 'Ubuntu', cursive;
		}
		.bod{
			border: 1px solid black;
			color: black;
		}

        #icones {
            margin-bottom: 10px;
        }

        #titulo_sobre {
            font-family: 'Ubuntu', cursive;
        }

		/*.btn{
			background-color: #337ab7;
			color: white;
		}*/
		/*.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover{
			background-color: #337ab7;
		}

		.navbar-inverse .navbar-nav>li>a {
    		color: white;
    	}*/



    </style>
    <div id="geral">
    	<nav class="navbar navbar-inverse navbar-fixed-top">
    		<div class="container-fluid">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>                        
    				</button>
    				<a class="navbar-brand" href="index.php"><span  class='fas fa-home'></span></a>
    			</div>
    			<div class="collapse navbar-collapse" id="myNavbar">
    				<ul class="nav navbar-nav" style="width: 80%; text-align: center;">
    					<li class=""><a href="index.php">Home</a></li>
    					<li><a href="view_sobre.php">Sobre</a></li>

    					<li style="width: 80%">
    						<form class="pesquisa-ponto form-inline" style="display: inline-block; width: 90%;" action="view_search_ponto.php" method="POST">		
    							<input type="text" name="search" id="form-controlpesq" class="form-control pesq" placeholder="Pesquise um ponto turístico" autocomplete="off">

    							<button type="submit" class="btn btn-primary pesq">Pesquisar</button>
    						</form>	
    						<p class="locais" id="locais"><a href=""></a></p>
    					</li>
    				</ul>

    				<?php if (!isset($_SESSION['user'])): ?>
    					<ul class="nav navbar-nav navbar-right">
    						<li><a href="#" data-toggle="modal" data-target="#myCadastro" id="cadastro"><span class="glyphicon glyphicon-user"></span> Cadastro</a></li>
    						<li><a href="#" data-toggle="modal" data-target="#myModal"  id="login"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
    					</ul>
    				<?php else: ?>
    					<ul class="nav navbar-nav navbar-right">
    						<li><a href="view_cadastrar_pontos.php">Cadastrar Pontos</a></li>
    						<li class="dropdown">
    							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conta <span class="caret"></span></a>
    							<ul class="dropdown-menu">
    								<li><a href="view_perfil.php">Perfil</a></li>
    								<li><a href="view_my_pontos.php">Meus Pontos</a></li>
    								
    								<li role="separator" class="divider"></li>
    								<li><a href="Controller/action_logout.php">Logout</a></li>
    							</ul>
    						</li>
    					</ul>
    				<?php endif ?>       
    			</div>
    		</div>
    	</nav>	



    	<!-- MODAL DE LOGIN -->
    	<?php  
    	if (isset($_GET['error'])){
    		?>
    		<div class="alert alert-danger" role="text">Login ou senha inválido!</div>		
    		<?php  }

    		?>
    		<!-- Primeiro modal-->
    		<div class="modal fade" id="myModal" role="dialog">
    			<div class="modal-dialog">

    				<div class="modal-content">
    					<div class="modal-header">
    						<button type="button" class="close" data-dismiss="modal">&times;</button>
    						<h2>Login</h2>
    					</div>
    					<div class="modal-body">
    						<form action="Controller/action_auth.php" method="POST">
    							<div class="form-group">
    								<a class="btn btn-block btn-social btn-facebook" href="returnFB.php">
    									<span class="fa fa-facebook"></span> Login com Facebook
    								</a><br>
    								<label for="login">Usuário:</label>
    								<input type="text" class="form-control" id="login" name="login" placeholder="Digite seu USUÁRIO cadastrado">
    							</div>
    							<div class="form-group">
    								<label for="pwd">Senha:</label>
    								<input type="password" class="form-control" id="pwd" name="senha" minlength="6" placeholder="Digite sua senha">
    							</div>
    							<div class="checkbox">
    								<label><input type="checkbox"> Lembrar de mim</label>
    							</div>
    							<button type="submit" class="btn btn-primary btn-block">Entrar</button>
    						</form>
    					</div>
    				</div>
    			</div>
    		</div>

    		<!-- Segundo modal -->
    		<div class="modal fade" id="myCadastro" role="dialog">
    			<div class="modal-dialog">

    				<div class="modal-content">
    					<div class="modal-header">
    						<button type="button" class="close" data-dismiss="modal">&times;</button>
    						<h2>Cadastro</h2>
    					</div>
    					<div class="modal-body">
    						<form action="Controller/action_cadastrar_usuario.php" method="POST">
    							<div class="form-group">
    								<label for="email">Nome Completo:</label>
    								<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo">
    								<div class="form-group">
    								</div>

    							</div>
    							<div class="form-group">
    								<label for="email">E-Mail:</label>
    								<input type="email" class="form-control" id="email" name="email" required="E-mail inválido" placeholder="Digite seu e-mail">
    							</div>
    							<div class="form-group">
    								<label for="login">Usuário:</label>
    								<input type="text" class="form-control" id="login" name="user" placeholder="Digite um nome de usuário">
    							</div>
    							<div class="form-group">
    								<label for="pwd">Senha:</label>
    								<input type="password" class="form-control" id="pwd" name="pass" minlength="6" placeholder="Insira uma senha">
    							</div>
    							<div class="form-group">
    								<label for="pwd">Confirme a Senha:</label>
    								<input type="password" class="form-control" id="pwd2" name="senha2" minlength="6" placeholder="Repita a senha">
    							</div>

    							<button type="submit" class="btn btn-primary btn-block">Cadastrar-se</button>
    						</form>
    					</div>
    				</div>
    			</div>
    		</div>
    		<!-- Footer -->
    		<?php
    		if(isset($_SESSION['cadastro_sucesso'])){
    			echo "<script>alert('Seja bem vindo, você agora já faz parte da nossa Comunidade');</script>";
    			session_destroy();
    		}

    		if(isset($_SESSION['cadastro_falhou'])) {
    			echo "<script>alert('Esse usuario já foi utilizado');</script>";
    			session_destroy();

    		}
    		
    		if(isset($_SESSION['fail_campo'])){
    			echo "<script>alert('Campos não preenchidos ou senhas não condizem!');</script>";
    			session_destroy();
    		}
