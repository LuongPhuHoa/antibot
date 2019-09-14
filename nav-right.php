<?php
error_reporting(0);
session_start();
if($_SESSION['apikey']){ ?>


<div class="col-md-3">
	<div class="col-md-12">
		<div class="panel panel-default">
		    <div class="panel-body">
		    	<ul class="nav justify-content-center">
					<li class="nav-item">
						<a class="nav-link" href="/manage"><i class="fa fa-link" aria-hidden="true"></i> Manage Shortlink</a>
					</li>
					<hr>
					<li class="nav-item">
						<a class="nav-link" href="/logout" ><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
					</li>
				</ul>
		    </div>
	  	</div>
	</div>
</div>

<?php }
?>