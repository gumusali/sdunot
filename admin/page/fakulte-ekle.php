<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Fakülte Ekle</title>
<!-- Form -->
<div id="form">
	<div class="title">Fakülte Ekle</div>
	
<form action="" method="post">
		<div class="form">
		<?php
			if( $_POST['add-faculty'] ) {
				$faculty = post('faculty');
				$sef 	 = permalink($faculty);
					
				if($faculty != '') {
					$check = $_sql->S("*", "faculty")->W("faculty_sef = '{$sef}'")->R(true);

					if( $check > 0 ) {
						echo "<div class='error'>Aynı isimde bir fakülte var</div>";
					} else {						
						$add = $_sql->I("faculty", "faculty_name, faculty_sef", "'{$faculty}', '{$sef}'")->R();
						
						if($add['status'] == 'ok') {
							echo "<div class='success'>Fakülte eklendi</div>";
						} else {
							echo "<div class='error'>Bir hata oluştu</div>";
						}
					}
				} else {
					echo "<div class='info'>Fakülte adı girin</div>";
				}
			}
		?>
			<div class="line">
				<div class="left">Fakülte Adı</div>
				<div class="right"><input type="text" name="faculty" /></div>
			</div>
			
			<div class="line">
				<input type="submit" value="Ekle" name="add-faculty" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->