	<?php require_once('view_header.php');

$bairro = [
				"AgamenonMagalhaes" 		=>	"Agamenon Magalhães",
                "aguaMineral" 				=>	"Água Mineral",
                "altodoCeu" 				=>	"Alto do Céu",
                "anadeAlbuquerque" 			=>	"Ana de ALbuquerque",
                "arcanjo" 					=>	"Arcanjo",
                "areiaBranca" 				=>	"Areia Branca",
                "barradoCeara" 				=>	"Barra do Ceára",
                "belaVista" 				=>	"Bela Vista",
                "belaVista" 				=>	"Boa Vista",
                "bomfim" 					=>	"Bomfim",
                "campinadeFeira" 			=>	"Campina de Feira",
                "centro" 					=>	"Centro",
                "cohab" 					=>	"Cohab",
                "cortegada" 				=>	"Cortegada",
                "cruzdeReboucas" 			=>	"Cruz de Rebouças",
                "duarteCoelho" 				=>	"Duarte Coelho",
                "encantodeIgarassu" 		=>	"Encanto de Igarassu",
                "inhama" 					=>	"Inhamã",
                "jabaco" 					=>	"Jabacó",
                "jardimBoaSorte" 			=>	"Jardim Boa Sorte",
                "jardimParaiso" 			=>	"Jardim Paraíso",
                "jardimSumare" 				=>	"Jardim Sumaré",
                "marcodePedra" 				=>	"Marco de Pedra",
                "meninoJesusdaPraga" 		=>	"Menino Jesus da Praga",
                "monjope" 					=>	"Monjope",
                "nossaSenhoradaConceicao" 	=>	"Senhora da Conceição",
                "panco" 					=>	"Panco",
                "postodeMonta" 				=>	"Posto de Monta",
                "rubina" 					=>	"Rubina",
                "santoAntonio" 				=>	"Santo Antônio",
                "sitiodosMarcos"			=>	"Sítio dos Marcos",
                "saoJose" 					=>	"São José",
                "santaMaria" 				=>	"Santa Maria",
                "santaRita" 				=>	"Santa Rita",
                "tabatinga" 				=>	"Tabatinga",
                "triunfo" 					=>	"Triunfo",
                "trupical" 					=>	"Trupical",
                "umbura" 					=>	"Umbura",
                "vilaRural" 				=>	"Vila Rural",
                "vilaSaramandaia" 			=>	"Vila Saramandaia",
];
 ?>

		<!--Carousel -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicadores do Carousel -->
			<ol class="carousel-indicators">

				<?php   $ativo = 0;
				while ($ativo < 3):
					if ($ativo == 0) { ?>
						<li data-target="#myCarousel" data-slide-to="<?=$ativo?>" class="active"></li>
						<?php $ativo++;
					}else{
						if($ativo <= 2):?>
							<li data-target="#myCarousel" data-slide-to="<?=$ativo;?>"></li>
							<?php $ativo++; ?>	
						<?php endif; 		
					}
				endwhile ?>


			</ol>

		<div class="container">
			
			<div class="carousel-inner" role="listbox">

				<?php 	$ativoCarr = 0;
				while($linha = $consulta -> fetch(PDO::FETCH_ASSOC)):
					if ($ativoCarr == 0) {?>
						<div class="item active">
							<a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
								<img style="width: 100%;height: 31em;" src="upload/<?=$linha['imagem'];?>">
							</a>
						</div>
						<?php 	$ativoCarr++;
					}else{
						if ($ativoCarr <= 2): ?>	
							<div class="item">
								<a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
									<img style="width: 100%;height: 31em;" src="upload/<?=$linha['imagem'];?>">
								</a>
							</div>
							<?php 	$ativoCarr++;
						endif;
					};
				endwhile; ?>

				<!-- Controles de Direita e Esquerda -->
			
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Anterior</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Próximo</span>
				</a>
			</div>		
		</div>
		</div>	<!-- Slides do Carousel -->


			<center>
				<h3 id="titulo_pontos">Aqui tem trabalho</h3>
			</center>
			<br>
				
				<!-- Igrejas -->
						
		<?php $v = 0;
			$igreja = 'igreja';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$igreja' ORDER BY id DESC;");
				if ($consultei->rowCount() >= 1): ?>
	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Igrejas Históricas</h2>
			</div>
			<div class="row" style="width: 100%;">
		<?php	while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail' >
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                	<img class="card-img-top" style="max-height: 11em;" src="upload/<?=$linha1['imagem'];?>">
			                </a>
			              </div>
			              <div class='post-content'>
			               <div class='category'><?=$linha1['bairro']?></div>
			                <h1 class='title' style="height: 1.5em;"><?=$linha1['nome_ponto']?></h1>
			                <p class='description' style="height: 2em;"><?= substr($linha1['descricao'],0 , 100); ?></p>
			                <div class='post-meta'>
			                  <span class='comments'>
			                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
			                  </span>
			                </div>
			              </div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>
<?php endif ?>

		<!-- Monumento -->

			<?php $v = 0;
			$monumento = 'monumento';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$monumento' ORDER BY id DESC;");
				if ($consultei->rowCount() >= 1): ?>
	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Monumentos Antigos</h2>
			</div>
			<div class="row" style="width: 100%;">
		<?php	while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail' >
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                	<img class="card-img-top" style="max-height: 11em;" src="upload/<?=$linha1['imagem'];?>">
			                </a>
			              </div>
			              <div class='post-content'>
			               <div class='category'><?=$linha1['bairro']?></div>
			                <h1 class='title' style="height: 1.5em;"><?=$linha1['nome_ponto']?></h1>
			                <p class='description' style="height: 2em;"><?= substr($linha1['descricao'],0 , 100); ?></p>
			                <div class='post-meta'>
			                  <span class='comments'>
			                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
			                  </span>
			                </div>
			              </div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>
<?php endif ?>
<br>			
	
				<!-- Museu -->

<?php $v = 0;
			$museu = 'museu';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$museu' ORDER BY id DESC;");
				if ($consultei->rowCount() >= 1): ?>
	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Museu Histórico</h2>
			</div>
			<div class="row" style="width: 100%;">
		<?php	while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail' >
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                	<img class="card-img-top" style="max-height: 11em;" src="upload/<?=$linha1['imagem'];?>">
			                </a>
			              </div>
			              <div class='post-content'>		
			                <div class='category'><?=$linha1['bairro']?></div>	
			                
			                <h1 class='title' style="height: 1.5em;"><?=$linha1['nome_ponto']?></h1>
			                <p class='description' style="height: 2em;"><?= substr($linha1['descricao'],0 , 100); ?></p>>
			                <div class='post-meta'>
			                  <span class='comments'>
			                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
			                  </span>
			                </div>
			              </div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>
<?php endif ?>
<br>

		<!-- Natureza e Parques -->

			<?php $v = 0;
			$natureza = 'naturezaparques';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$natureza' ORDER BY id DESC;");
				if ($consultei->rowCount() >= 1): ?>
	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Natureza e Parques</h2>
			</div>
			<div class="row" style="width: 100%;">
		<?php	while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail' >
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                	<img class="card-img-top" style="max-height: 11em;" src="upload/<?=$linha1['imagem'];?>">
			                </a>
			              </div>
			              <div class='post-content'>
			               <div class='category'><?=$linha1['bairro']?></div>
			                <h1 class='title' style="height: 1.5em;"><?=$linha1['nome_ponto']?></h1>
			                <p class='description' style="height: 2em;"><?= substr($linha1['descricao'],0 , 100); ?></p>
			                <div class='post-meta'>
				                <span class='comments'>
				                	<a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
				                </span>
			                </div>
			              </div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>
<?php endif ?>
<br>			

				<!-- Praias -->

		<?php $v = 0;
			$praia = 'praia';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$praia' ORDER BY categoria ASC;");
				if ($consultei->rowCount() >= 1): ?>
					
	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Praias</h2>
			</div>
			<div class="row">
	<?php while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
					if ($v <= 2 ):?>
					<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail'>
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                	<img style="height: 11em;" src="upload/<?=$linha1['imagem'];?>">
			                </a>
			              </div>
			              <div class='post-content'>
			            	<div class='category'><?=$linha1['bairro']?></div>
				        	<h1 class='title'><?=$linha1['nome_ponto']?></h1>
			                <p class='description' style="height: 2em;"><?= substr($linha1['descricao'],0 , 100); ?></p>
			                <div class='post-meta'>
			                  <span class='comments'>
			                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
			                  </span>
			                </div>
			              </div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>
<?php endif ?>
						
						<!-- Praça -->

			<?php $v = 0;
			$igreja = 'praca';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$igreja' ORDER BY categoria ASC;");
				if ($consultei->rowCount() >= 1): ?>

		<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Praças</h2>
			</div>
			<div class="row">
	<?php	while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			             	<div class='thumbnail'>
			                	<a  href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                		<img class="rounded mx-auto d-block" style="max-height: 11em;" src="upload/<?=$linha1['imagem'];?>">
			                	</a>
			             	</div>
			            	<div class='post-content'>
			            	<div class='category'><?=$linha1['bairro']?></div>
			                
			                <h1 class='title'><?=$linha1['nome_ponto']?></h1>
			                <p class='description' style="height: 2em;"><?= substr($linha1['descricao'],0 , 100); ?></p>
				                <div class='post-meta'>
				                  <span class='comments'>
				                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
				                  </span>
				                </div>
			            	</div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>	
<?php endif ?>
		<br> 
	
				<!-- Rio -->

<?php $v = 0;
			$rio = 'rio';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$rio' ORDER BY id DESC;");
				if ($consultei->rowCount() >= 1): ?>
	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Rio</h2>
			</div>
			<div class="row" style="width: 100%;">
		<?php	while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail' >
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                	<img class="card-img-top" style="max-height: 11em;" src="upload/<?=$linha1['imagem'];?>">
			                </a>
			              </div>
			              <div class='post-content'>
			               <div class='category'><?=$linha1['bairro']?></div>
			                <h1 class='title' style="height: 1.5em;"><?=$linha1['nome_ponto']?></h1>
			                <p class='description' style="height: 2em;"><?= substr($linha1['descricao'],0 , 78); ?></p>
			                <div class='post-meta'>
			                  <span class='comments'>
			                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
			                  </span>
			                </div>
			              </div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>
<?php endif ?>
<br>


		<!-- Footer -->
		<?php 
		//toninho_login("   Bem vindo<b> " .$_SESSION['user']."</b></br> para onde vamos hoje?");
		require_once('view_footer.html');
		
		?>	