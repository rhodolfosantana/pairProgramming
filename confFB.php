<?php 
session_start();
include('Facebook/autoload.php');


$fb = new Facebook\Facebook([
  'app_id' => '182971195943531', // Replace {app-id} with your app id
  'app_secret' => 'a57144817d42a5ce6e660cc1b66f1db7',
  'default_graph_version' => 'v2.2',
  ]);

?>