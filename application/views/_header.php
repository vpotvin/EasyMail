<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title></title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet' type='text/css' href='css/main.css' media='screen'>

		<!--[if lt IE 9 ]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<style>
	</style>

	<body>
		<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<?php
					// if(!$loggedin) {
						echo "<form action='login.php' method='get' class='cred'>";
						echo	"<input type='submit' class='btn btn-success' value='LOGIN'>";
						echo "</form>";
					// } else {
						// echo "<form action='/~gq002/p1/logout.php' class='cred'>";
						// echo	"<input type='submit' class='btn btn-danger' value='LOGOUT'>";
						// echo "</form>";
						echo "<form action='#' method='get' class='cred'>";
						echo 	"<input type='submit' class='btn btn-info form-control' value='Change Password'>";
						echo "</form>";
					//}
				?>
				<form action='#' method='get' class='cred'>
					<input type='submit' class='btn btn-link form-control' value='Application Settings'>
				</form>

				<form action='#' method='get' class='cred'>
					<input type='submit' class='btn btn-link form-control' value='Upload'>
				</form>

				<form action='#' method='get' class='cred'>
					<input type='submit' class='btn btn-link' value='Download'>
				</form>		
			</div>
		</div>