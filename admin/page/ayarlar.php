<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Ayarlar</title>
<?php
	# Class
	$sql 	= $GLOBALS['sql'];
	$fun 	= $GLOBALS['function'];
	# Variables	
?>
<!-- Form -->
<div id="form">
	<div class="title">Ayarlar</div>
	
	<form action="" method="post" >
		<div class="form">
			<?php
				# Update settings
				if( $_POST )
				{
					foreach( $_POST as $key => $value )
					{
						$sql->U("ayarlar","deger = '{$value}'")->W("ayar = '{$key}'")->R();
					}
				}
				
				# Get Settings
				$ayarlar = $sql->S("*","ayarlar")->W("liste = '1'")->R();
				
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
				<input type="submit" value="Kaydet" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->