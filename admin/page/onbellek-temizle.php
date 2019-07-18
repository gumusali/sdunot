<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Önbellek Temizle</title>
<div id='form'>
	<div class='title'>Önbellek Temizle</div>
		<?php
			if( $_POST['onbellek-sil'] )
			{
				$fun    = $GLOBALS['function'];
				$folder = $fun->filter("post", "klasor");

				if( $folder != "" )
				{
					$s       = 0;
					$error   = 0;
					$dir     = getenv("DOCUMENT_ROOT")."/file/cache/{$folder}/";
					$opendir = opendir($dir);

					while( $readdir = readdir($opendir) )
					{
						if( $readdir != "." && $readdir != ".." )
						{
							$del = unlink($dir.$readdir);
							if( !$del ){ $error = 1; }else{ $s++; }
						}
					}

					if($error == 1)
					{
						echo "<div class='error'>Bazı dosyalar silinmedi. Silinen dosya sayısı : {$s}</div>";
					}
					else
					{
						echo "<div class='success'>Silinen dosya sayısı : {$s}</div>";
					}
				}
				else
				{
					echo "<div class='error'>Hatalı klasör</div>";
				}
			}
		?>
		<form action='' method='post'>
			<div class='form'>
				<div class="line">
					<div class="left">Klasör Seç :</div>
					<div class="right">
						<div class="select">
							<div class="newSelect">
								<select name="klasor">
									<?php
										$opendir = opendir(getenv("DOCUMENT_ROOT")."/file/cache/");

										while( $readdir = readdir($opendir) )
										{
											if( $readdir != "." && $readdir != ".." )
											{
												echo "<option value=\"{$readdir}\">{$readdir}</option>";
											}
										}
									?>
								</select>
									
								<div class="newOptions"></div>
								<div class="newSelected"></div>
								<div class="newSelectDown"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="line">
					<input type="submit" name="onbellek-sil" value="Temizle">
				</div>						
			</div>
		</form>
	</div>
</div>