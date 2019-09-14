<?php
require_once('autoload.php');
/**
 * @Author: Nokia 1337
 * @Date:   2019-09-13 16:15:38
 * @Last Modified by:   Nokia 1337
 * @Last Modified time: 2019-09-13 18:28:27
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
					<p><em>Manage Shortlink</em></p>	
					<div class="panel panel-default">
					    <div class="panel-body">
							<form action="#" method="post">
							  <div class="form-row">
							    <div class="form-group col-md-12">
							      <label for="inputEmail4">URL / Domain</label>
							      <input type="text" class="form-control" placeholder="https://google.com" name="url" id="url">
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="inputPassword4">Blocked</label>
							       	<select class="form-control" name="blocked" id="blocked">
								      <option value="0">No Blocked</option>
								      <option value="1">Block IP Proxy (Only)</option>
								      <option value="2">Block IP Hosting (Only)</option>
								      <option value="4">Block Hostname & UAgent (Only)</option>
								      <option value="3">Block All</option>
								    </select>
							    </div>
							    <div class="form-group col-md-6">
							    	<label for="inputEmail4">-</label> 
							  		<input type="button" value="Create shortlink" id="submit" onclick="generateLink()" class="form-control" />
							    </div>
							  </div>
							</form>
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
	                                <th>KEYNAME</th>
	                                <th>URL/DOMAIN</th>
	                                <th>VISITOR</th>
	                                <th>-</th>
	                                <th>-</th>
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
		$.get("/api/shortlink", function(data, status){
			var json = JSON.parse(data);
		    loadTable('data-table', ['date', 'keyname', 'url', 'visitor', 'view', 'delete'], json['respons']['list']);
		});
	</script>
</div>
</body>
</html>