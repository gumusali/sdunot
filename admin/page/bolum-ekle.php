<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Bölüm Ekle</title>
<!-- Form -->
<div id="form">
	<div class="title">Bölüm Ekle</div>
	
<form action="" method="post">
		<div class="form">
		<?php
			if( $_POST['add-department'] ) {
				$faculty    = post('faculty');
				$department = post('department');			
				$sef 		= permalink($department);
				$semester   = post('semester');
					
				if($department != '') {
					$check = $_sql->S("*", "department")->W("department_sef = '{$sef}' AND faculty_id = '{$faculty}'")->R(true);

					if( $check > 0 ) {
						echo "<div class='error'>Aynı isimde bir bölüm var</div>";
					} else {
						
						$add = $_sql->I("department", "department_name, department_sef, faculty_id, semester", "'{$department}', '{$sef}', '{$faculty}', '{$semester}'")->R();
						
						if($add['status'] == 'ok') {
							echo "<div class='success'>Bölüm eklendi</div>";
						} else {
							echo "<div class='error'>Bir hata oluştu</div>";
						}
					}
				} else {
					echo "<div class='info'>Bölüm adı girin</div>";
				}
			}
		?>
			<div class="line">
				<div class="left">Fakülte</div>
				<div class="right">
					<select name="faculty" required>
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
				<div class="left">Bölüm Adı</div>
				<div class="right"><input type="text" name="department" /></div>
			</div>
			
			<div class="line">
				<div class="left">Yıl</div>
				<div class="right"><input type="text" name="semester" value="4" /></div>
			</div>
			
			<div class="line">
				<input type="submit" value="Ekle" name="add-department" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->