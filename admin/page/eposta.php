<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>E-Posta Ayarları</title>
<!-- Form -->
<div id="form">
	<div class="title">E-Posta Ayarları</div>
	
	<form action="" method="post">
		<div class="form">
		<?php
			if( $_POST['eposta-duzenle'] ) {
				$server = post('server');
				$port   = post('port');
				$adres  = post('adres');
				$secure = post('secure');
				$pass   = post('sifre');
				
				# update
				$_sql->U("settings", "value = '{$server}'")->W("setting = 'mail_server'")->R();
				$_sql->U("settings", "value = '{$port}'")->W("setting = 'mail_port'")->R();
				$_sql->U("settings", "value = '{$adres}'")->W("setting = 'mail_address'")->R();
				$_sql->U("settings", "value = '{$secure}'")->W("setting = 'mail_security'")->R();
				$_sql->U("settings", "value = '{$pass}'")->W("setting = 'mail_pass'")->R();
			}
			
			# 
			$set  = $_sql->S("*", "settings")->R();
			$k    = array();
			
			foreach($set as $a) {
				$k[$a['setting']] = $a['value'];
			}
		?>
			<div class="line">
				<div class="left">Server</div>
				<div class="right"><input type="text" name="server" value="<?php echo $k['mail_server']; ?>" /></div>
			</div>
						
			<div class="line">
				<div class="left">E-Posta Adres</div>
				<div class="right"><input type="text" name="adres" value="<?php echo $k['mail_address']; ?>" /></div>
			</div>
			
			<div class="line">
				<div class="left">Şifre</div>
				<div class="right"><input type="password" name="sifre" value="<?php echo $k['mail_pass']; ?>" /></div>
			</div>
			
			<div class="line">
				<div class="left">Port</div>
				<div class="right"><input type="text" name="port" value="<?php echo $k['mail_port']; ?>" /></div>
			</div>
			
			<div class="line">
				<div class="left">Bağlantı</div>
				<div class="right"><input type="text" name="secure" value="<?php echo $k['mail_security']; ?>" /></div>
			</div>

			<div class="line">
				<input type="submit" value="Güncelle" name="eposta-duzenle" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->