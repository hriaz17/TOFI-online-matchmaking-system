<!doctype html>
<html>
	<head>
		<?php if ($pageTitle=='Home') {?><title>TOFI - Online Matchmaking System</title><?php }?>
		<title><?php echo $pageTitle;?> - TOFI</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" href="css/my-fonts.css">
		<link rel="stylesheet" type="text/css" href="fonts/stylesheet.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	</head>

	<body>

		<div id="navbar">
			<img id="logo" src="img/logo.png">
			<div id="nav">
				<ul id="nav-ul">
					<li><a <?php if ($pageTitle=='Home') {?>class="active"<?php } ?> href="index.php">Home</a></li>
					<li><a <?php if ($pageTitle=='My Profile') {?>class="active"<?php } ?>href="myprofile.php">My Profile</a></li>
					
				</ul>
			</div>
		</div>