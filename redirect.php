<?php
require_once('autoload.php');
/**
 * @Author: Nokia 1337
 * @Date:   2019-09-13 18:55:48
 * @Last Modified by:   Nokia 1337
 * @Last Modified time: 2019-09-16 01:13:48
*/

if(file_exists('api/api.key')){
	$apikey = file_get_contents('api/api.key');
}else{
    die('Please log in first with the api key.');
}

$check 	= $Antibot->keyname( $apikey , $_GET['query'] );
$json 	= $Antibot->json($check); 

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')){
        $ipaddress = getenv('HTTP_CLIENT_IP');
    }
    if(getenv('HTTP_X_FORWARDED_FOR')){
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    }
    if(getenv('HTTP_X_FORWARDED')){
        $ipaddress = getenv('HTTP_X_FORWARDED');
    }
    if(getenv('HTTP_FORWARDED_FOR')){
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    }
    if(getenv('HTTP_FORWARDED')){
       $ipaddress = getenv('HTTP_FORWARDED');
    }
    if(getenv('REMOTE_ADDR')){
        $ipaddress = getenv('REMOTE_ADDR');
    }
    $ipaddress = explode(",",  $ipaddress);
    return $ipaddress[0];
}
if('::1' == get_client_ip() || '127.0.0.1' == get_client_ip() ){
	$ipaddress = '8.8.8.8';
}else{
	$ipaddress = get_client_ip();
}

if($json['status']){
	$respons 	= $Antibot->check($apikey , $json['respons']['respons']['keyname'] , $ipaddress );
	$jhonson 	= $Antibot->json($respons); 
	

	if($jhonson['status'] && $jhonson["respons"]['is_bot'] == false ||  $jhonson["respons"]['is_bot'] == 0){
		die(header("Location: ".$json['respons']['respons']['url']));
	}else{
		$Antibot->error(403);
	}
    
}else{
	$Antibot->error(404);
}