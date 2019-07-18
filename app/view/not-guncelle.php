<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Not Güncelle</title>
		<?php
			css('bootstrap-theme.min.css', 'bootstrap.min.css', 'style.css');
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/file/image/favicon.png"/>
	</head>

	<body>
		<!-- header -->
		<?php tmp('header'); ?>
		<!-- end header -->
		
		<div class="container minHeight">
			<?php
				if(isset($_SESSION['user_id'])) {
					echo $_alert;
			?>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="fakulte">Fakülte Adı:</label>
									<select name="fakulte" id="fakulte" class="form-control">
									  <option value="" disabled selected>Fakülte seçin</option>
									  <?php
									  		foreach($faculty as $f) {
									  			echo "<option value='{$f['faculty_id']}'>{$f['faculty_name']}</option>";
									  		}
									  ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="bolum">Bölüm Adı:</label>
									<select name="bolum" id="bolum" class="form-control" >
									  <option value="" disabled selected>Bölüm seçin</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="donem">Sınıf:</label>
									<select name="donem" id="donem" class="form-control" >
									  <option value="" disabled selected>Sınıf seçin</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="ders">Ders Adı:</label>
									<select name="ders" id="ders" class="form-control" required>
									  <option value="<?=$doc['lesson_id']?>" selected><?=$doc['lesson_name']?></option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="aciklama">Açıklama:</label>
									<textarea name="aciklama" id="aciklama" class="form-control" required><?=$doc['doc_name']?></textarea>
								</div>
							</div>
								
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="file">
										<label for="dosya">Dosya Seçin</label>
										<input name="dosya" style="display: none" id="dosya" class="form-control" type="file" />
										<div class="clear"></div>
										<small class="form-text text-muted">Sadece zip, rar, png, jpg ve pdf uzantılı dosyalar yüklenebilir</small>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<button class="btn btn-info btn-outline" style="float: right; background-color: #AD1915; border: 1px solid #AD1915" name="kaydet">Yükle</button>
							</div>
									
						</div>
					</form>
			<?php
				} else {
					echo "<div class='alert alert-info'>Not güncellemek için giriş yapmalısınız</div>";
				}
			?>
		</div>

		<?php tmp('footer'); js('select_menu.js', 'file.js'); ?>
	</body>
</html>