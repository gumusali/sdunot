<?php
	session_start();
		
	# login control
	if( !isset($_SESSION['root_login']) ){ Header("Location:/"); exit(); }
	
	# timezone
	date_default_timezone_set("Europe/Istanbul");
	
	# init
	include($_SERVER['DOCUMENT_ROOT']. '/app/init.php');
?>
<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet"  href="css/style.css" />
		<link rel="stylesheet"  href="css/reset.css" />
		<link rel="stylesheet"  href="css/newSelect.css" />
		<link rel="stylesheet"  href="css/perfect-scrollbar.min.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript" src="js/file.js"></script>
		<script type="text/javascript" src="js/newSelect.js"></script>
		<script type="text/javascript" src="js/perfect-scrollbar.jquery.min.js"></script>
		<script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
		<?php js('select_menu.js'); ?>
		<script type="text/javascript">
		$(function(){
			$('#menu, #container').perfectScrollbar();
		});
		</script>
    </head>
    <body>
		<!-- Menu -->
		<?php include("menu.php"); ?>
		<!-- End Menu -->
		
		<!-- Container -->
		<div id="container">
			<!-- Header -->
			<div id="header">
				<div class="menuSlide"></div>
				<a href='/admin/login.php?logout=true'><div class="logout">Çıkış</div></a>
			</div>
			<!-- End Header -->
			
			<!-- Content -->
			<div id="content">
				<?php
					$page = get('page');
					$dir  = getenv("DOCUMENT_ROOT")."/admin/page/{$page}.php";
					
					if( file_exists($dir) ) {
						include($dir);
					}
				?>
			</div>
			<!-- End Content -->
		</div>
		<!-- End Container -->
    </body>
</html>