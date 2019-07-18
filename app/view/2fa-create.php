<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>2 Adımlı Doğrulama</title>
		<?php
			css('bootstrap-theme.min.css', 'bootstrap.min.css', 'style.css');
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/file/image/favicon.png"/>
	</head>

	<body>
		<!-- header -->
		<?php tmp('header'); ?>
		<!-- end header -->
		
		<div class="container minHeight">
			<div class="alert alert-info">
				Giriş yaptıktan sonra 2 adımlı doğrulama kodunu alabilmek için aşağıdaki QR kodunu uthenticator uygulamasına okutmanız gerekmektedir. QR kodunu okuttuktan sonra tekrar giriş yap sayfasından giriş yapınız
			</div>

			<div class="row">
				<div class="col-md-12">
					<center>
						<img src="<?=$qrCodeUrl?>" />
					</center>
				</div>
			</div>
		</div>

		<?php tmp('footer'); ?>
	</body>
</html>