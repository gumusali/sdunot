<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Fakülte Düzenle</title>
<!-- Form -->
<div id="form">
	<div class="title">Fakülte Düzenle</div>
	
<form action="" method="post">
		<div class="form">
		<?php
			$id = get('id');

			if( $_POST['update-faculty'] ) {
				$faculty = post('faculty');
				$sef 	 = permalink($faculty);
					
				if($faculty != '') {
					$check = $_sql->S("*", "faculty")->W("faculty_sef = '{$sef}'")->R(true);

					if( $check > 0 ) {
						echo "<div class='error'>Aynı isimde bir fakülte var</div>";
					} else {						
						$add = $_sql->U("faculty", "faculty_name = '{$faculty}', faculty_sef = '{$sef}'")->W("faculty_id = '{$id}'")->R();
						
						if($add['status'] == 'ok') {
							echo "<div class='success'>Fakülte güncellendi</div>";
						} else {
							echo "<div class='error'>Bir hata oluştu</div>";
						}
					}
				} else {
					echo "<div class='info'>Fakülte adı girin</div>";
				}
			}

			# faculty
			$f = $_sql->S("*", "faculty")->W("faculty_id = '{$id}'")->R();
			$f = $f[0];
		?>
			<div class="line">
				<div class="left">Fakülte Adı</div>
				<div class="right"><input type="text" name="faculty" value="<?=$f['faculty_name']?>" /></div>
			</div>
			
			<div class="line">
				<input type="submit" value="Düzenle" name="update-faculty" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->