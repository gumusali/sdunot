<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Logo & Favicon</title>
<?php
	# Class
	$sql    = $GLOBALS['sql'];
	$fun    = $GLOBALS['function'];
	$upload = $GLOBALS['upload'];
	# Variables
	
?>
<!-- Form -->
<div id="form">
	<div class="title">Logo & Favicon</div>
	
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form">
		<?php
			if( $_POST['ekle'] )
			{
				# Upload image
				if( $_FILES['logo']['name'] )
				{
					# Upload
					$upload->set('logo', 'slider')->info();
					$upload->change_dir("file/image");
					$upload->name("logo_".time());
					$img = $upload->upload();
					# Db					
					if ( $img != '' )
					{
						$add_db = $sql->U("ayarlar", "deger = '{$img}'")->W("ayar = 'logo'")->R();
						
						if( $add_db['status'] == 'OK' )
						{
							echo "<div class='success'>Logo değiştirildi</div>";
							# Delete
							@unlink(getenv("DOCUMENT_ROOT")."/file/image/".logo);
						}
						else
						{
							echo "<div class='error'>Veritabanına eklenirken bir sorun oluştu</div>";
							# Delete
							@unlink(getenv("DOCUMENT_ROOT")."/file/image/{$img}");
						}
					}
					else
					{
						echo "<div class='error'>Logo yüklenirken bir hata oluştu</div>";
					}
				}

				# Upload image
				if( $_FILES['favicon']['name'] )
				{
					# Upload
					$upload->set('favicon', 'slider')->info();
					$upload->change_dir("file/image");
					$upload->name("favicon_".time());
					$img = $upload->upload();
					# Db					
					if ( $img != '' )
					{
						$add_db = $sql->U("ayarlar", "favicon = '{$img}'")->R();
						
						if( $add_db['status'] == 'OK' )
						{
							echo "<div class='success'>Favicon değiştirildi</div>";
							# Delete
							@unlink(getenv("DOCUMENT_ROOT")."/file/image/".logo);
						}
						else
						{
							echo "<div class='error'>Veritabanına eklenirken bir sorun oluştu</div>";
							# Delete
							@unlink(getenv("DOCUMENT_ROOT")."/file/image/{$img}");
						}
					}
					else
					{
						echo "<div class='error'>Logo yüklenirken bir hata oluştu</div>";
					}
				}
			}
		?>
			<div class="line">
				<div class="left">Logo</div>
				<div class="right"><div class="file"><input type="file" id="file" name="logo" /><label for="file">Dosya Seç</label></div></div>
			</div>
			
			<div class="line">
				<div class="left">Favicon</div>
				<div class="right"><div class="file"><input type="file" id="file2" name="favicon" /><label for="file2">Dosya Seç</label></div></div>
			</div>
			
			<div class="line">
				<input type="submit" value="Kaydet" name="ekle" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->