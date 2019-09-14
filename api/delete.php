<?php
/**
 * @Author: Nokia 1337
 * @Date:   2019-09-13 16:59:18
 * @Last Modified by:   Nokia 1337
 * @Last Modified time: 2019-09-13 17:24:26
 */
require_once('../autoload.php');
if(isset($_SESSION['apikey']) && isset($_SESSION['login']) && isset($_GET['query'])){
	print_r( $Antibot->delete( $_SESSION['apikey']  , $_GET['query']) );
}