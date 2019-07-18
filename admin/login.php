<?php
	session_start();

	# ob_start
	ob_start();

	# init
	include($_SERVER['DOCUMENT_ROOT']. '/app/init.php');
		
	# logout
	if( $_GET['logout'] ) {
		unset($_SESSION['root_login']);
		unset($_SESSION['root_admin']);
		redirect('index');
		exit();
	}
	
	# if already logged in
	if( isset($_SESSION['root_login']) ) {
		redirect('admin');
	} else {
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet"  href="css/style.css" />
				<link rel="stylesheet"  href="css/reset.css" />
				<title>Giriş</title>
			</head>
			<body>
				<!-- Login -->
				<form action="" method="post">
					<div id="login">
						<div class="title">Yönetici Giriş</div>

						<div class="line">
							<div class="left">Kullanıcı Adı</div>
							<div class="right">
								<input type="text" name="user" />
							</div>
						</div>

						<div class="line">
							<div class="left">Şifre</div>
							<div class="right">
								<input type="password" name="pass" />
							</div>
						</div>
						
						<div class="line">
							<?php
								if( $_POST['login'] ) {
									$user = post('user');
									$pass = encrypt(post('pass'));
									$db   = $_sql->S("*", "admin")->W("admin_user = '{$user}' AND admin_pass = '{$pass}'")->R(true);
									
									if( $db > 0 ) {
										$_SESSION['root_login'] = true;
										$_SESSION['root_admin'] = $user;
										
										redirect('admin');
									} else {
										echo "<div class=\"error\">Kullanıcı adı ya da şifre yanlış</div>";
									}
								}
							?>
						</div>

						<div class="line">
							<input type="submit" value="Giriş" name="login" />
						</div>

						<div class="clear"></div>
					</div>
				</form>
				<!-- End Login -->
			</body>
		</html>
<?php
	}

	# end flush
	ob_end_flush();
?>