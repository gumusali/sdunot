<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Ayar Ekle</title>
<?php
	# Class
	$sql 	= $GLOBALS['sql'];
	$fun 	= $GLOBALS['function'];
	# Variables	
?>
<!-- Form -->
<div id="form">
	<div class="title">Ayar Ekle</div>
	
	<form action="" method="post">
		<div class="form">
		<?php
			if( $_POST['ayar-ekle'] )
			{
				$ayar  = mb_strtolower($fun->filter('post','ayar'));
				$deger = $fun->filter('post','deger');
				$tanim = $fun->filter('post','tanim');
				$liste = $fun->filter('post','liste'); if($liste == "on"){ $liste = 1; }else{ $liste = 0; }
				$empty = $fun->is_empty($ayar, $deger);
				
				if( $empty )
				{
						# DB kontrol
						$dbk = $sql->S("*","ayarlar")->W("ayar = '{$ayar}'")->R(true);
						
						if( $dbk == 0 )
						{
							# Ekle
							$col  = "ayar, deger, tanim, liste";
							$val  = "'{$ayar}', '{$deger}', '{$tanim}', '{$liste}'";
							$ekle = $sql->I('ayarlar', $col, $val)->R();
							
							if( $ekle['status'] == 'OK' )
							{
								echo "<div class='success'>Eklendi</div>";
							}
							else
							{
								echo "<div class='error'>Veritabanında bir hata oluştu. Tekrar deneyin</div>";
							}
							
						}
						else
						{
							echo "<div class='info'>Ayar ekli</div>";
						}
					
				}
				else
				{
					echo "<div class='info'>Tüm alanları doldurun</div>";
				}
			}
		?>
			<div class="line">
				<div class="left">Ayar</div>
				<div class="right"><input type="text" name="ayar" /></div>
			</div>
			
			<div class="line">
				<div class="left">Değer</div>
				<div class="right"><input type="text" name="deger" /></div>
			</div>
			
			<div class="line">
				<div class="left">Tanım</div>
				<div class="right"><input type="text" name="tanim" /></div>
			</div>
			
			<div class="line">
				<div class="left">Ayarlar sayfasında gösterilsin mi?</div>
				<div class="right">
					<div class="newCheck">
						<input type="checkbox" name="liste" />
					</div>
				</div>
			</div>
			
			<div class="line">
				<input type="submit" value="Kaydet" name="ayar-ekle" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->