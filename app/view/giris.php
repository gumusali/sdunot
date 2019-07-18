<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Giriş</title>
		<?php
			css('bootstrap-theme.min.css', 'bootstrap.min.css', 'style.css');
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/file/image/favicon.png"/>
	</head>

	<body>
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50">
				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						<a href="/"><?php logo(); ?></a>
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen geçerli bir e-posta giriniz.">
						<input class="input100" type="text" name="mail" placeholder="E-posta" required value="<?php if(isset($_COOKIE['mail'])){ echo $_COOKIE['mail']; } ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen bir şifre giriniz.">
						<input class="input100" type="password" name="pass" placeholder="Şifre" required value="<?php if(isset($_COOKIE['pass'])){ echo $_COOKIE['pass']; } ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" <?php if(isset($_COOKIE['rme'])){ echo $_COOKIE['rme']; } ?>>
						<label class="label-checkbox100" for="ckb1">
							Beni hatırla
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn" style="background-color: #AD1915;color: white; " >GİRİŞ</button>
					</div>
					

					<!-- <div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Farklı giriş yapın
						</span>
					</div>

					<a href="<?=$loginUrl?>" class="btn-face m-b-10" scope="public_profile,email" onclick="login()">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="<?=$google_login_url?>" class="btn-google m-b-10">
						<img src="/app/assets/styles/images/icon-google.png" />
						Google
					</a> -->
					<div class="text-center w-full p-t-42 p-b-22">
						<a href="/sifremi-unuttum"><span class="txt1" style="color: #0000cc">
							Şifremi Unuttum
						</span></a>
					</div>
				</form>
				<?php if(isset($_alert)) { echo $_alert; } ?>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>