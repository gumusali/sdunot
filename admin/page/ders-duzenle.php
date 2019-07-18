<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Ders Düzenle</title>
<!-- Form -->
<div id="form">
	<div class="title">Ders Düzenle</div>
	
<form action="" method="post">
		<div class="form">
		<?php
			$id = get('id');

			if( $_POST['update-lesson'] ) {
				$department = post('department');			
				$lesson     = post('lesson');
				$sef 		= permalink($lesson);
				$year       = post('year');		
				$term       = post('term');		
					
				if($lesson != '') {
					$check = $_sql->S("*", "lesson")->W("department_id = '{$department}' AND lesson_name = '{$lesson}'")->R(true);

					if( $check > 0 ) {
						echo "<div class='error'>Aynı isimde bir ders var</div>";
					} else {						
						$add = $_sql->U("lesson", "lesson_name = '{$lesson}', lesson_sef = '{$sef}', department_id = '{$department}', year = '{$year}', term = '{$term}'")->W("lesson_id = '{$id}'")->R();
						
						if($add['status'] == 'ok') {
							echo "<div class='success'>Ders güncellendi</div>";
						} else {
							echo "<div class='error'>Bir hata oluştu</div>";
						}
					}
				} else {
					echo "<div class='info'>Ders adı girin</div>";
				}
			}

			$l = $_sql->S("*", "lesson")->W("lesson_id = '{$id}'")->R();
			$l = $l[0];
		?>
			<div class="line">
				<div class="left">Fakülte</div>
				<div class="right">
					<select name="faculty" id="fakulte" required>
						<option value="" disabled selected>Fakülte seçin</option>
						<?php
							$fac = $_sql->S("*", "faculty")->O("faculty_name ASC")->R();

							foreach($fac as $f) {
								echo "<option value='{$f['faculty_id']}'>{$f['faculty_name']}</option>";
							}
						?>
					</select>
				</div>
			</div>

			<div class="line">
				<div class="left">Bölüm</div>
				<div class="right">
					<select name="department" id="bolum" required>
						<option value="" disabled selected>Bölüm seçin</option>
					</select>
				</div>
			</div>
			
			<div class="line">
				<div class="left">Ders Adı</div>
				<div class="right"><input type="text" name="lesson" value="<?=$l['lesson_name']?>" /></select>
				</div>
			</div>

			<div class="line">
				<div class="left">Yıl</div>
				<div class="right"><input type="text" name="year" value="<?=$l['year']?>" /></div>
			</div>

			<div class="line">
				<div class="left">Dönem</div>
				<div class="right"><input type="text" name="term" value="<?=$l['term']?>" /></div>
			</div>
			
			<div class="line">
				<input type="submit" value="Düzenle" name="update-lesson" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->