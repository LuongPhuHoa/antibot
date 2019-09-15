<?php
error_reporting(0);
session_start();
?>
<noscript>
 For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="https://www.enable-javascript.com/"> instructions how to enable JavaScript in your web browser</a>.
</noscript>
<script src="//code.jquery.com/jquery-1.4.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="/manage.js"></script>
<hr>
<script type="text/javascript">
	function comming(){
		Swal.fire({
		  title: 'Comming Soon',
		  text: 'Under development',
		  type: 'info',
		});
	}
	<?php
	if($_SESSION['alert']){
		echo "Swal.fire({
		  title: '".$_SESSION['alert']['title']."',
		  text: '".$_SESSION['alert']['message']."',
		  type: '".$_SESSION['alert']['icon']."',
		});";
	}
	unset($_SESSION['alert']);
	$check 	= file_get_contents("version.txt");
	$serv 	= file_get_contents("https://antibot.pw/downloads/version.txt");
	if($serv > $check){
		echo "Swal.fire({
		  title: 'UPDATE ALERT',
		  text: 'Pleas update to version : ".$serv."',
		  type: 'error',
		});";
	}
	?>
</script>
<center>&copy; Copyright <?= date("Y");?> <a href="https://antibot.pw" style=" color: yellow;">ANTIBOT.PW</a> - Real Visitor Detection | All rights reserved.</center>
<br>
<br>
<br>