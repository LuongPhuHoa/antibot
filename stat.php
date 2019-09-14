<?php
require_once('autoload.php');
/**
 * @Author: Nokia 1337
 * @Date:   2019-09-13 16:15:38
 * @Last Modified by:   Nokia 1337
 * @Last Modified time: 2019-09-15 01:30:31
 */
if(empty($_SESSION['apikey'])){
	die(header("Location: /"));
}
?>
<html>
<head>
	<title>DASHBOARD - Manage Shortlink</title>
	<?php
		require_once('assets-link.php');
		if(empty($_GET['query'])){
			die(header("Location: /manage"));
		}

		$check 	= $Antibot->view( $_SESSION['apikey'] , $_GET['query'] );
		$json 	= $Antibot->json($check); 
		if($json['status'] == false){
			die(header("Location: /manage"));
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
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<p><em>Statistics : <?= $json['respons']['short']['keyname'];?> (Real Time)</em></p>	
					<div class="panel panel-default">
					    <div class="panel-body">
					    	<center>
					    		<em> 
					    			<span class="badge badge-light" id="stat_live"><span class="badge badge-light">-</span></span>
					    			<span class="badge badge-light" id="stat_die" style="color: red;"><span class="badge badge-light" style="color: red;">-</span></span>
					    			<span class="badge badge-light" id="stat_total" style="color: red;"><span class="badge badge-light" style="color: yellow;">-</span></span>
					    		</em>
					    	</center>
					    </div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="panel panel-default">
					    <div class="panel-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                              	        <label for="inputPassword4">Shortlink</label>
                               	        <input class="form-control" id="shortlinkID" value="https://<?=$_SERVER['HTTP_HOST'];?>/r/<?= $json['respons']['short']['keyname'];?>" readonly="">
                                    </div>
                                    <div class="form-group col-md-3">
                                	    <label for="inputEmail4">-</label>
                              		    <button class="form-control js-copy-bob-btn">Copy Link</button>
                                    </div>
                                    <div class="form-group col-md-6">
                                	    <label for="inputEmail4">Domain</label>
                              		    <input class="form-control" id="linkID" value="<?= $json['respons']['short']['url'];?>" readonly="">
                                    </div>
                                    <div class="form-group col-md-3">
                                	    <label for="inputEmail4">-</label>
                              		    <button class="form-control js-copy-jane-btn">Copy Link</button>
                                    </div>
                                    <div class="form-group col-md-12">
                                    	<hr>
                                    	<small>For changes in url or block type, please go to <a href="https://antibot.pw">antibot.pw</a></small>
                                    </div>
                              </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-12">
					<div class="panel panel-default">
					    <div class="panel-body"> 
					    	<table id="data-table" class="table table-striped table-bordered table-condensed table-hover">
	                            <thead>
	                              <tr>
	                                <th>DATE</th>
	                                <th>IP</th>
	                                <th>ISP</th>
	                                <th>COUNTRY</th>
	                                <th>STATUS</th>
	                              </tr>
	                            </thead>
	                            <tbody>
	                            </tbody>
	                       </table>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		require_once('assets-footer.php');
	?>
	<script type="text/javascript">
		update();
		function update(){ 
        	$.get("/view/<?= $_GET['query'];?>", function(data, status){
				var json = JSON.parse(data);
				
				$("#stat_live").html('<span class="badge badge-light">'+json['respons']['statistik']['real']+' VISITOR</span>');
	        	$("#stat_die").html('<span class="badge badge-light" style="color: red;">'+json['respons']['statistik']['bot']+' BOT VISITOR</span>');
	        	$("#stat_total").html('<span class="badge badge-light" style="color: yellow;">'+json['respons']['statistik']['total']+' TOTAL VISITOR</span>');

			    loadTable('data-table', ['date', 'ip', 'isp', 'country', 'status'], json['respons']['list']);
			});
        }
		$(document).ready(function(e) {
            setInterval(update,2000);
        });
	</script>
</div>
</body>
</html>