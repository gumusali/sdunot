<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Şifre Değiştir</title>
<?php
	# Class
	$sql 	= $GLOBALS['sql'];
	$fun 	= $GLOBALS['function'];
	# Variables	
?>
<!-- Form -->
<div id="form">
	<div class="title">Şifre Değiştir</div>
	
	<form action="" method="post">
		<div class="form">
		<?php
			if( $_POST['sifre-guncelle'] )
			{
				$mevcut = $fun->encrypt($fun->filter('post','mevcut'));
				$yeni   = $fun->filter('post','yeni');
				$tekrar = $fun->filter('post','tekrar');
				
				$empty = $fun->is_empty($mevcut, $yeni, $tekrar);
				
				if( $empty )
				{
					if( $yeni == $tekrar )
					{
						# Kontrol
						$eski = $sql->S("*", "yonetici")->W("sifre = '{$mevcut}'")->R(true);
						
						if( $eski > 0 )
						{
							# Güncelle
							$new = $fun->encrypt($yeni);
							$up  = $sql->U("yonetici", "sifre = '{$new}'")->R();
							
							if( $up['status'] == 'OK' )
							{
								echo "<div class='success'>Şifre güncellendi</div>";
							}
							else
							{
								echo "<div class='error'>Veritabanında bir hata oluştu. Tekrar deneyin</div>";
							}
						}
						else
						{
							echo "<div class='error'>Mevcut şifre hatalı</div>";
						}
					}
					else
					{
						echo "<div class='info'>Yeni şifreler eşleşmiyor</div>";
					}
				}
				else
				{
					echo "<div class='info'>Tüm alanları doldurun</div>";
				}
			}
		?>
			<div class="line">
				<div class="left">Mevcut Şifre</div>
				<div class="right"><input type="password" name="mevcut" /></div>
			</div>
			
			<div class="line">
				<div class="left">Yeni Şifre</div>
				<div class="right"><input type="password" name="yeni" /></div>
			</div>
			
			<div class="line">
				<div class="left">Yeni Şifre Tekrar</div>
				<div class="right"><input type="password" name="tekrar" /></div>
			</div>
			
			<div class="line">
				<input type="submit" value="Kaydet" name="sifre-guncelle" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->