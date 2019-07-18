<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Mesaj Sil</title>
<?php
	# Class
	$sql    = $GLOBALS['sql'];
	$fun    = $GLOBALS['function'];
	# Variables
	$id = $fun->filter("get", "id");
?>
<!-- Form -->
<div id="form">
	<div class="title">Mesaj Sil</div>
	
	<form action="" method="post">
		<div class="form">
		<?php
			if( $_POST['mesaj-sil'] )
			{
				$del = $sql->D("iletisim")->W("id = '{$id}'")->R();
				
				if( $del['status'] == "OK" )
				{
					echo "<div class='success'>Mesaj silindi</div>";
				}
				else
				{
					echo "<div class='error'>Bir hata oluştu</div>";
				}
			}
			else
			{
				$p  = $sql->S("*","iletisim")->W("id = '{$id}'")->R();
		?>
				<div class="line">
					<div class="left">Silicenek Mesaj</div>
					<div class="right"><?php echo $p[0]['mesaj']; ?></div>
				</div>
				
				<div class="line">
					<input type="submit" value="Sil" name="mesaj-sil" />
				</div>
		<?php
			}
		?>
		</div>
	</form>
</div>
<!-- End Form -->