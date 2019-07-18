<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Anasayfa</title>
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
		
		<div class="container">
			<div class="imgShowcase">
				<img src="/file/image/bgimg.png" class="img-responsive" style="width: 100%;" />
			</div>

			<div id="hakkimizda">
				<h2 style="color: #AD1915">Biz Kimiz?</h2>
				<p>Süleyman Demirel Üniversitesi Mühendislik Fakültesi Bilgisayar Mühendisliği öğrencileri tarafından kurulan bu site, Süleyman Demirel Üniversitesi bünyesindeki tüm fakülte ve derslere ait ders dökümanlarını sizlere ücretsiz sunar.</p>
				<p>
Üniversite içinde (ve üniversiteler arası) not paylaşımını sağlamak amacıyla kurulan sitemize üye olmak kaydıyla site içerisindeki notları indirebilir, kendi elinizde bulunan notları da  siteye ekleyerek farklı kullanıcılarla paylaşabilirsiniz. Aynı zamanda iletişim kısmından bize ulaşarak not/ders talebinde bulunabilirsiniz. </p>
<p>
İnternet sayfamızda bulunan bilgiler sitemiz tarafından yapılan araştırmalar sonucunda derlenerek sizlere sunulmaktadır. Daha yeni faaliyete geçmiş bir site olarak mevcut ders notu sayımız sizin de katkılarınızla büyüyecektir.</p> <p>
CodersNotFound ailesi olarak herhangi bir kurum ya da kişi ile bir ilgimiz bulunmamaktadır.</p>
			</div>
			<div id="iletisim">
				<h2 style="color: #AD1915">İletişim</h2>
				<form action="" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="name">Ad Soyad:</label>
								<input type="text" name="name" id="name" class="form-control" required <?php if(isset($_SESSION['user_id'])){ echo "value='{$_SESSION['user_name']}'"; echo "readonly"; } ?>>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="mail">Mail :</label>
								<input type="text" name="mail" id="mail" class="form-control" required <?php if(isset($_SESSION['user_id'])){ echo "value='{$_SESSION['user_mail']}'"; echo "readonly"; } ?>>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="subject">Konu :</label>
								<input type="text" name="subject" id="subject" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row" >
						<div class="col-md-12">
							<div class="form-group">
								<label for="message">Mesaj: </label>
								<textarea name="message" class="form-control" style="min-width: 100%; max-width: 100%"></textarea>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-info btn-outline" type="submit" style="float: right; background-color: #AD1915; border: 1px solid #AD1915">Gönder</button>
						</div>
						
					</div>
				</form>
				<?php if(isset($_alert)){ echo $_alert; } ?>		
			</div>
		</div>

		<?php tmp('footer'); ?>
	</body>
</html>