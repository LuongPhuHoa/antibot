<?php
require_once('../autoload.php');
if($_POST['apikey']){
	$respons 	= $Antibot->login($_POST['apikey']);
	$json 		= $Antibot->json($respons); 
	if($json['respons']['apikey'] && $json['status']){
		$_SESSION['login'] 	= true;
		$_SESSION['apikey'] = $_POST['apikey'];
		file_put_contents('api.key', $_POST['apikey']);
	}
	echo $respons;
}