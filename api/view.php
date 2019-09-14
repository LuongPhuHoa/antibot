<?php
require_once('../autoload.php');


if(isset($_SESSION['apikey']) && isset($_SESSION['login']) && isset($_GET['query']) ){
	print_r( $Antibot->view( $_SESSION['apikey'] , $_GET['query'] ) );
}