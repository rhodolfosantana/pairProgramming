<?php 
session_start();
include "conexao.php";
if(isset($_GET['id_user_ponto']) && isset($_GET['ponto_id'])){
$id_user_ponto = htmlspecialchars($_GET['id_user_ponto'], ENT_QUOTES);
$id_ponto = $_GET['ponto_id'];

if (intval($id_user_ponto) == $_SESSION['id']){

	$delete = $conn->prepare("DELETE FROM pontos_turisticos WHERE id = ?");
	$delete->bindParam(1,$id_ponto);
	$delete->execute();

header('location:../view_my_pontos.php');

}
}
else {

echo "<script>alert('erro')</script>";	
}
?>