<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Kod</title>
<?php
	# Class
	$sql 	= $GLOBALS['sql'];
	$fun 	= $GLOBALS['function'];
	# Variables	
?>
<!-- Form -->
<div id="form">
	<div class="title">Kod</div>
	
	<form action="" method="post" >
		<div class="form">
			<?php
				# Update settings
				if( $_POST['kaydet'] )
				{
					$kod_1 = htmlspecialchars($_POST['kod_1']);
					$kod_2 = htmlspecialchars($_POST['kod_2']);
					$kod_3 = htmlspecialchars($_POST['kod_3']);
					$kod_4 = htmlspecialchars($_POST['kod_4']);
					
					$sql->U("ayarlar","deger = '{$kod_1}'")->W("ayar = 'kod_1'")->R();
					$sql->U("ayarlar","deger = '{$kod_2}'")->W("ayar = 'kod_2'")->R();
					$sql->U("ayarlar","deger = '{$kod_3}'")->W("ayar = 'kod_3'")->R();
					$sql->U("ayarlar","deger = '{$kod_4}'")->W("ayar = 'kod_4'")->R();
				}
				
				# Get Settings
				$ayarlar = $sql->S("*","ayarlar")->W("ayar IN('kod_1', 'kod_2', 'kod_3', 'kod_4')")->R();
				
				foreach( $ayarlar as $ayar )
				{
					echo "
						<div class=\"line\">
							<div class=\"left\">{$ayar['tanim']} ({$ayar['ayar']})</div>
							<div class=\"right\"><input type=\"text\" name=\"{$ayar['ayar']}\" value=\"{$ayar['deger']}\" /></div>
						</div>
						 ";
				}
			?>
	
			<div class="line">
				<input type="submit" name="kaydet" value="Kaydet" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->