<?php
require_once('view_header.php');
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit();
}

?>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Ubuntu');
body {

	margin-top: 25px;
}
  
/*.pesq{
	margin-top: 7px;
	margin-left: 7px;
*/

.form{
    margin-top: 3em;
}

#titulo_cadastro {
	font-family: 'Ubuntu', cursive;
}

.cad{
    margin-top: 5em;
    margin-bottom: 7em;
}
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */


</style>
<div class="container cad">
	<h1 id="titulo_cadastro"> Cadastro de Pontos Turísticos </h1>
    <div class="form">
	<form method="POST" action="Controller/action_cadastrar_pontoMarkers.php" class="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="text">Nome do Ponto:</label>
            <input type="text" class="form-control" name="nome_ponto">
        </div>

        <div class="form-group">
            <label for="text">Logradouro:</label>
            <input type="text" class="form-control" name="logradouro">
        </div>
       
<!--         <div class="form-group">
            <label for="text">Bairro:</label>
            <input type="text" class="form-control" name="bairro">
        </div> -->
        <div class="form-group">    
            <label for="sel1">Selecione o bairro:</label>
            <select class="form-control" name="bairro">
                <option value="Agamenon Magalhães">      Agamenon Magalhães</option>
                <option value="Água Mineral">            Água Mineral</option>
                <option value="Alto do Ceu">              Alto do Céu</option>
                <option value="Ana de Albuquerque">       Ana de ALbuquerque</option>
                <option value="Arcanjo">                Arcanjo</option>
                <option value="Areia Branca">            Areia Branca</option>
                <option value="Barra do Ceara">           Barra do Ceára</option>
                <option value="Bela Vista">              Bela Vista</option>
                <option value="Boa Vista">              Boa Vista</option>
                <option value="Bomfim">                 Bomfim</option>
                <option value="Campina de Feira">         Campina de Feira</option>
                <option value="Centro">                 Centro</option>
                <option value="Cohab">                  Cohab</option>
                <option value="Cortegada">              Cortegada</option>
                <option value="Cruz de Rebouças">         Cruz de Rebouças</option>
                <option value="Duarte Coelho">           Duarte Coelho</option>
                <option value="Encanto de Igarassu">      Encanto de Igarassu</option>
                <option value="Inhamã">                 Inhamã</option>
                <option value="Jabacó">                 Jabacó</option>
                <option value="Jardim Boa Sorte">         Jardim Boa Sorte</option>
                <option value="Jardim Paraíso">          Jardim Paraíso</option>
                <option value="Jardim Sumaré">           Jardim Sumaré</option>
                <option value="Marcode Pedra">           Marco de Pedra</option>
                <option value="Menino Jesus da Praga">     Menino Jesus da Praga</option>
                <option value="Monjope">                Monjope</option>
                <option value="Nossa Senhora da Conceicao">Nossa Senhora da Conceição</option>
                <option value="Panco">                  Panco</option>
                <option value="Posto de Monta">           Posto de Monta</option>
                <option value="Rubina">                 Rubina</option>
                <option value="Santo Antônio">           Santo Antônio</option>
                <option value="Sítio dos Marcos">         Sítio dos Marcos</option>
                <option value="São José">                São José</option>
                <option value="Santa Maria">             Santa Maria</option>
                <option value="Santa Rita">              Santa Rita</option>
                <option value="Tabatinga">              Tabatinga</option>
                <option value="Triunfo">                Triunfo</option>
                <option value="Trupical">               Trupical</option>
                <option value="Umbura">                 Umbura</option>
                <option value="Vila Rural">              Vila Rural</option>
                <option value="Saramandaia">    		Saramandaia</option>
            </select>
        </div>

        <div class="form-group">
            <label for="text">Número:</label>
            <input type="text" class="form-control" name="numero">
        </div>
        
        <div class="form-group">
            <label for="comment">Descrição:</label>
            <textarea type="text" class="form-control" name="descricao"></textarea>
        </div>

        <div class="form-group">
            <label for="file">Imagem:</label>
            <input type="file" class="form-control file" name="imagem">
        </div>
    	
        <div class="form-group">	
        <label for="sel1">Selecione o tipo de ponto:</label>
          <select class="form-control" name="categoria">
            <option value="igreja">Igrejas Históricas</option>
            <option value="monumento">Monumentos Antigos</option>
            <option value="museu">Museus Históricos</option>
            <option value="naturezaparques">Natureza e Parques</option>
            <option value="praia">Praia</option>
            <option value="praca">Praça</option>
            <option value="rio">Rio</option>
          </select>
        </div>
          <div class="form-group">    
    	     	<input type="submit" value="Cadastrar" class="btn btn-primary">
    	   </div>


	</form>
    </div>
</div>

<?php 
	
	require_once('view_footer.html');
 ?>