
<?php 
function toninho_login($frase){  $frase = $frase; 
if($_SESSION['user'] != null){ ?>

<p 	id="news1"><b></b></p>
			<a href="#news1"></a>
			<div id="toninho">
				<img id="imagem" src="images/toninho.png"/ onload=" history.pushState('data','titulo',' ');">
					<div id="texto">
					<?php echo $frase; ?> </br> </div>
						<a class="fechar" title="Ok"  onclick="document.getElementById('toninho').style.display ='none'; history.pushState('data','titulo',' ');
 ">X</a> 
						

				<?php 
				if(isset($_SESSION['user'])){

					if($_SESSION['loguei'] == null){
				
						echo "<script>
					 		window.location = '/#news1';

							document.getElementById('toninho').style.display = '';
							
							</script>";
							$_SESSION['loguei']=true;
					}
		
				}
						}



echo "</div>";
						}?>


