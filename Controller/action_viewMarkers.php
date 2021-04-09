<?php
require("conexao.php");
$id = $_GET['id'];

function parseToXML($htmlStr){
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
}

// Select all the rows in the markers table
$stmt = $conn->prepare("SELECT * FROM pontos_turisticos WHERE id = $id ");
$stmt->bindParam(1,$id);
$stmt->execute();

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';
// Iterate through the rows, printing XML nodes for each
foreach ($stmt as $row_markers) {
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row_markers['nome_ponto']) . '" ';
  echo 'address="' . parseToXML($row_markers['logradouro']) . '" ';
  echo 'lat="' . $row_markers['lat'] . '" ';
  echo 'lng="' . $row_markers['lng'] . '" ';
  echo 'type="' . $row_markers['categoria'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';