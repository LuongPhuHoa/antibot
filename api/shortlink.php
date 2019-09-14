<?php
require_once('../autoload.php');
if(isset($_SESSION['apikey']) && isset($_SESSION['login'])){
	print_r( $Antibot->shortlink( $_SESSION['apikey'] ) );
}