<?php 
session_start();
include('confFB.php');
include'Controller/conexao.php';
?>
<!DOCTYPE html>
<html>
	<head>

		<title></title>

	</head>

<h3>Redirect...</h3>
	<body>
		<?php


$Login = $fb-> getRedirectLoginHelper();
$permissions = ['email'];
try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $Login->getAccessToken();
    }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        $oAuth2Client = $fb->getOAuth2Client();
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    if (isset($_GET['code'])) {
        header('Location: localhost:8000');
    }
    try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
        $profile = $profile_request->getGraphNode()->asArray();
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: localhost:8000");
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    var_dump($profile);
    $logoff = filter_input(INPUT_GET, 'sair', FILTER_DEFAULT);
    if (isset($logoff) && $logoff == 'true'):
        session_destroy();
        header("Location: localhost:8000");
    endif;
    echo '<a href="?sair=true">Sair</a>';
    $nome = $profile['name'];
    $email = $profile['email'];
    $pass = $profile['id'];

if($nome != null && $email != null && $pass != null){

        $user = $email;
        

        $checking=("SELECT * FROM Users WHERE user = ?");

        $queryOne = $conn->prepare($checking);
        $queryOne->bindParam(1,$user);
        $queryOne -> execute();

        $stmt = $queryOne->fetch();
            
        if ($stmt[0] != null){
                
            
    
    $consulta=$conn->prepare("SELECT id,user,password FROM Users WHERE user=? AND password=? ");
    $consulta->bindParam(1,$user);
    $consulta->bindParam(2,$pass);
    $consulta->execute();

    if ($consulta->rowCount() >= 1){
        $dados = $consulta->fetch();
        session_start();
        $_SESSION['id']  = $dados['id'];
        $_SESSION['user'] = $user; 
        header("Location: /index.php");

    } else {
        header("Location: /index.php?erro");

    }
        } else {
            
            $sql = "INSERT INTO Users(name, user, password) VALUES (:nome, :user, :pass)";
            $query = $conn->prepare($sql);
            $query->bindParam(':nome', $nome);
            $query->bindParam(':user', $user);
            $query->bindParam(':pass', $pass);
            $stmt = $query->execute();
                
                    $_SESSION['cadastro_sucesso'] = true;

            
                                
       
        }   
        
    }else {
        $_SESSION['fail_campo']=true;
            header('location:../index.php');
    }



}else {
    $loginUrl = $Login->getLoginUrl('http://localhost:8000/returnFB.php', $permissions);
    header('location:'. $loginUrl);
    


}


?>

	</body>
	</html>
