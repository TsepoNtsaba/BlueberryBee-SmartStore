<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="">    
		<link rel="shortcut icon" href="assets/img/favicon.png">
		<title>Smart Store</title>
		<!-- in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>
	
		<!-- Bootstrap core CSS -->
		<link href="<?php echo URL; ?>public/css/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="<?php echo URL; ?>public/css/bootstrap/bootstrap-response.css" rel="stylesheet">

		<link href="<?php echo URL; ?>public/css/stylish-portfolio.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="<?php echo URL; ?>public/css/bootstrap/main.css" rel="stylesheet">
		<link href="<?php echo URL; ?>public/css/bootstrap/reports.css" rel="stylesheet">
		<link href="<?php echo URL; ?>public/css/bootstrap/application.css" rel="stylesheet">
		
		<link href="<?php echo URL; ?>public/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">
		<link href="<?php echo URL; ?>public/plugins/cirque/cirque.css" rel="stylesheet">
		
		<!-- Fonts from Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
		<link href="<?php echo URL; ?>public/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Fixed navbar --
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><b>Smart Store</b></a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<?php if (Session::get('user_logged_in') == true){?>
							<li><a href="<?php echo URL; ?>dashboard/add_product">Add Product</a></li>
							<li><a href="<?php echo URL; ?>login/logout">Logout</a></li>
						<?php }else{ ?>
							<li><a href="<?php echo URL; ?>login/index">Login</a></li>
						<?php } ?>
						<li><a href="#">Already a member?</a></li>
					</ul>
				</div><!--/.nav-collapse 
			</div>
		</div>-->

		<a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle"><i class="fa fa-bars"></i></a>
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
				<li class="sidebar-brand"><a href="<?php echo URL; ?>index/index"><img src="<?php echo URL; ?>/public/img/bee.png" width="80" height="50" alt=""></a></li>
				<?php if (Session::get('user_logged_in') == true){?>
					<li><a href="<?php echo URL; ?>dashboard/stock">Inventory Intake</a>
						<ul>
							<li>
								<a href="<?php echo URL; ?>dashboard/add_stock">Add Stock</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo URL; ?>dashboard/report">Report</a>
					</li>
					<li><a href="<?php echo URL; ?>login/logout">Logout</a></li>
					<!--li>
						<a href="./receivedStock.php">Received Stock</a>
					</li-->
					
				<?php }else{ ?>
					<!--li>
						<a href="#about">About</a>
					</li-->
					<li><a href="<?php echo URL; ?>login/index">Login</a></li>
					<li>
						<a href="#register">Register</a>
					</li>
				<?php } ?>
			</ul>
		</div>
    
    