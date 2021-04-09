<?php 

session_start();

use PHPMailer\PHPMailer\PHPMailer;
require '../PHPMailer/vendor/autoload.php';

$nome = $_SESSION['nomeCadastro'];
$email = $_SESSION['emailCadastro'];

$mail = new PHPMailer;
//Aqui é a call do bozo, onde você decide qual protocolo vai usar, se é pop3 etc..
$mail->isSMTP();
//Aqui é onde os erros vão ficar evidentes
// 0 = não mostrar msgs
// 1 = msg do navegador
// 2 = msg do navegador e erros do server
$mail->SMTPDebug = 0;
//o ip do servidor de email de sua preferencia
$mail->Host = 'smtp.gmail.com';
//colocar a porta do smtp
$mail->Port = 587;
//definir o tipo de criptografia https
$mail->SMTPSecure = 'tls';
//verificação se o email é válido mesmo
$mail->SMTPAuth = true;
//Email de quem vai enviar 
$mail->Username = "suporte.seuturismo@gmail.com";
//Senha do email a cima  kkk
$mail->Password = "seuturismo123456";
//Aqui a gente coloca realmente o titulo e o email de quem está enviando
$mail->setFrom('suporte.seuturismo@gmail.com', 'SEUTURISMO');
//Aqui já é no caso se a pessoa tiver outro email pra enviar.
$mail->addReplyTo('suporte.seuturismo@gmail.com', 'SEUTURISMO');
//Atenção, aqui é aonde o email e o nome dos usuários ficaram
$mail->addAddress($email, $nome);
//Corpo, oq vai ter dentro da caixa de email
$mail->Subject = 'SeuTurismo Cadastro';
//Aqui a gente coloca um html básico para envio
$mail->msgHTML(file_get_contents('emailPronto.html'),dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'Teste';
// $mail->addAttachment('images/phpmailer_mini.png');
//se caso ocorrerem erros, ele imprime na tela ypah
if(!$mail->send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	
	header('location: ../index.php');
	// echo "<script> location.replace('../index.php'); </script>";
	exit();
}

?>