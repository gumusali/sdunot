<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Ders Ekle</title>
<!-- Form -->
<div id="form">
	<div class="title">Ders Ekle</div>
	
<form action="" method="post">
		<div class="form">
		<?php
			if( $_POST['add-lesson'] ) {
				$department = post('department');			
				$lesson     = post('lesson');
				$sef 		= permalink($lesson);
				$year       = post('year');		
				$term       = post('term');		
					
				if($lesson != '') {
					$check = $_sql->S("*", "lesson")->W("department_id = '{$department}' AND lesson_sef = '{$sef}'")->R(true);

					if( $check > 0 ) {
						echo "<div class='error'>Aynı isimde bir ders var</div>";
					} else {						
						$add = $_sql->I("lesson", "lesson_name, lesson_sef, department_id, year, term", "'{$lesson}', '{$sef}', '{$department}', '{$year}', '{$term}'")->R();
						
						if($add['status'] == 'ok') {
							echo "<div class='success'>Ders eklendi</div>";
						} else {
							echo "<div class='error'>Bir hata oluştu</div>";
						}
					}
				} else {
					echo "<div class='info'>Ders adı girin</div>";
				}
			}
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
				<div class="right"><input type="text" name="lesson" /></select>
				</div>
			</div>

			<div class="line">
				<div class="left">Yıl</div>
				<div class="right"><input type="text" name="year" value="1" /></div>
			</div>

			<div class="line">
				<div class="left">Dönem</div>
				<div class="right"><input type="text" name="term" value="1" /></div>
			</div>
			
			<div class="line">
				<input type="submit" value="Ekle" name="add-lesson" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->