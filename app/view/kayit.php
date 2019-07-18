<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Kayıt</title>
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
					<span class="login100-form-title p-b-55">
						<a href="/"><?php logo(); ?></a>
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen geçerli bir e-posta giriniz.">
						<input class="input100" type="text" name="name" placeholder="İsim">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen bir şifre giriniz.">
						<input class="input100" type="text" name="surname" placeholder="Soyisim">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen geçerli bir e-posta giriniz.">
						<input class="input100" type="text" name="username" placeholder="Kullanıcı Adı">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen bir şifre giriniz.">
						<input class="input100" type="text" name="email" placeholder="E-posta">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen bir şifre giriniz.">
						<input class="input100" type="password" name="pass" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen geçerli bir e-posta giriniz.">
						<input class="input100" type="password" name="pass2" placeholder="Şifre Tekrar">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-25">
							<button type="submit" class="login100-form-btn" style="background-color: #AD1915;color: white; " >KAYDOL</button>
					</div>

					<!-- <div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Farklı kaydolun
						</span>
					</div>

					<a href="<?=$loginUrl?>" class="btn-face m-b-10">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="<?=$google_login_url?>" class="btn-google m-b-10">
						<img src="/app/assets/styles/images/icon-google.png" />
						Google
					</a> -->					
					
				</form>
				<?php if(isset($_alert)){ echo $_alert; } ?>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>