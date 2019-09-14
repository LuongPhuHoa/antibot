<?php
	require_once('autoload.php'); 
	if(!empty($_SESSION['apikey'])){
		die(header("Location: /manage"));
	}
?>
<html>
<head>
	<title>DASHBOARD</title>
	<?php
		require_once('assets-link.php');
		if(file_exists('api/api.key')){
        	$apikey     = file_get_contents('api/api.key');
        	$message    = 'Last Login APIKEY: '.substr($apikey, 0 , 10)."xxxxxx";
        }else{
            $message = 'Activate Account';
        }
	?>
</head>
<body>
<div class="container">
	<?php
		require_once('nav-cover.php');
	?>
	<div class="row">
		<?php
			require_once('nav-right.php');
		?>
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12 ">
					<div class="panel panel-default">
					    <div class="panel-body">
					    	<center>
					    		<h3 class="display-4">WELCOME</h1>
					    		<p><?= $message;?></p>
					    	</center>
					    	<hr>
					    	<form action="#" method="post">
							  <div class="form-row">
							    <div class="form-group col-md-12">
							      <label for="inputEmail4">API KEY</label>
							      <input type="text" class="form-control" placeholder="API KEY" id="apikey" name="apikey">
							    </div>
							    <div class="form-group col-md-6">
							  		<input type="button" value="Login" id="submit" onclick="validate()" class="form-control" />
							    </div>
							  </div>
							</form>
					    	<hr>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		require_once('assets-footer.php');
	?>
</div>
</body>
</html>