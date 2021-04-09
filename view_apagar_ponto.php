<?php

	if(isset($_SESSION['id'])){

$consulta = $conn -> prepare("SELECT user_id FROM pontos_turisticos WHERE user_id=? and id=?");
$consulta -> bindValue(1,$_SESSION['id']);
$consulta -> bindValue(2,$id);
$consulta ->execute();
$linha = $consulta -> fetch(PDO::FETCH_ASSOC);

if($linha['user_id'] == $_SESSION['id']){

?>		
<div style="margin-right: 0px;">
  
  <button class = "btn btn-success">
    Apagar Esse ponto Turistico
  </button>

  <a class = "btn btn-danger" href="Controller/action_apagar_ponto.php?id_user_ponto=<?php echo $linha['user_id'];?>&ponto_id=<?php echo $id;?>" style = "display: none; margin-top: 0px; ">
    Apagar
  </a>
<script type="text/javascript">
	
var button = document.querySelector(".btn-success");
var button2 = document.querySelector(".btn-danger");

button.onclick = function() {

 button2.style.display = "";
}
</script>
<?php
}
}
?>