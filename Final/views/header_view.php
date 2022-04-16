<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/fontawesome/css/all.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/home.css')?>">
	<script type="text/javascript">
		var base_url = '<?=base_url()?>';
	</script>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-bottom: 20px;">
			<div class="logo">
				<img src="<?=base_url('assets/img/ez.png')?>">
			</div>
			<div class="clock">
				<h2 id="clock">5:30 PM</h2>
			</div>
			<div class="menu">
				<ul>
					<li><a href="<?=base_url()?>">Home</a></li>
					<?php if(!isset($_SESSION['user'])){ ?>
					<li><a href="<?=base_url('index.php/home/login')?>">Login</a></li>
					<li><a href="<?=base_url('index.php/home/register')?>">Register</a></li>
					<?php
					}else{
					?>
					<li><a href="<?=base_url('index.php/admin/view_profile')?>">Dashboard</a></li>
					<li><a href="<?=base_url('index.php/home/logout')?>">logout</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>