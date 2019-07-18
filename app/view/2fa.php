<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>2FA</title>
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

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lütfen geçerli bir telefon numarası giriniz.">
						<input class="input100" type="text" name="secret" placeholder="Onay Kodu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn" style="background-color: #AD1915;color: white; " >GÖNDER</button>
					</div>
				</form>
				<?php if(isset($_alert)) { echo $_alert; } ?>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>