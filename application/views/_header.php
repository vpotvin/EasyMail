<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title></title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet' type='text/css' href='/css/main.css' media='screen'>

		<!--[if lt IE 9 ]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<style>
	</style>

	<body>
		<nav class="navbar navbar-default" role="navigation">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="/">
        				<img alt="Brand" src="/images/newlogo.png">
        				EasyMail
      				</a>
    			</div>
    			<?php
					if(!$logged_in) {
						echo "<form action='/login' method='get' class='cred'>";
						echo	"<input type='submit' class='btn btn-success' value='LOGIN'>";
						echo "</form>";
					} else {
						echo "<form action='/logout' class='cred'>";
						echo	"<input type='submit' class='btn btn-danger' value='LOGOUT'>";
						echo "</form>";
					}
				?>
				<ul class="nav navbar-nav">
					<li class="dropdown">
	          			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></a>
	         			 <ul class="dropdown-menu" role="menu">
	            			<li><a href="#">Upload Email List</a></li>
	           				<li><a href="#">Download Email List</a></li>
	            			<li><a href="#">Remove Duplicates</a></li>
	           				<li class="divider"></li>
	            			<li><a href="#">Saved Drafts</a></li>
	            			<li class="divider"></li>
	            			<li><a href="#">System Settings</a></li>
	          			</ul>
	        		</li>
	        	</ul>
		</nav>

		<div class="container-fluid">
		<div class="row">
			<?php 
				if($flashMessages) {
					//print_r($flashMessages);
					foreach ($flashMessages as $message) { 
						echo "<div class='col-lg-12'>";
						echo "	<div class='alert alert-" . $message['CSS'] . " fade in'>";
						echo "		<a href='#' data-dismiss='alert' class='close'>X</a>";
						echo 		$message['message'];
						echo "	</div>";
						echo "</div>";
					}
				}
			?>


		</div>