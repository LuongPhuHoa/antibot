<?php
/**
 * @Author: Nokia 1337
 * @Date:   2019-09-13 18:33:02
 * @Last Modified by:   Nokia 1337
 * @Last Modified time: 2019-09-15 03:20:50
 */ 
require_once('../autoload.php');
if( isset($_SESSION['apikey']) && isset($_SESSION['login']) && isset($_POST['url'])  ){
	$post = array(
		'url' 		=> $_POST['url'],
		'blocked' 	=> $_POST['blocked'], 
	);
	print_r($Antibot->generate( $_SESSION['apikey'] , $post));
}