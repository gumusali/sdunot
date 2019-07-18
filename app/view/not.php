<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Not Detay</title>
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
		
		<div class="container">
			<h3 style="color: #ad1915;">Not Detay</h3>
	
		<div class="row">
			<div class="col-md-6">
				<label>Fakülte Adı:</label>
				<label style="color: #808080"><?=$doc['faculty_name']?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label>Bölüm Adı:</label>
				<label style="color: #808080"><?=$doc['department_name']?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label>Ders Adı:</label>
				<label style="color: #808080"><?=$doc['lesson_name']?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label>Dosya Adı:</label>
				<label style="color: #808080"><?=$doc['doc_file']?><a href='/file/upload/<?=$doc['doc_file']?>'><span class="fa fa-download" style="margin-left: 10px;font-size: 20px;color:#000"></a></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label>Açıklama:</label>
				<label style="color: #808080"><?=$doc['doc_name']?></label>
			</div>
		</div>
		
		<h3 style="color: #ad1915;">Yorum Ekle</h3>
		
		<?php
			if(isset($_SESSION['user_id'])) {
		?>
				<form action="" method="post">		
					<div class="row" >
						<div class="col-md-6">
							<div class="form-group">
								<label for="Ad">Yorum: </label>
								<textarea required name="comment" class="form-control" style="min-width: 100%; max-width: 100%"></textarea>
							</div>		
						</div>			
					</div>		
					<div class="row">
						<div class="col-md-6">
							<button type="submit" class="btn btn-info btn-outline" style="float: right; background-color: #AD1915; border: 1px solid #AD1915">Ekle</button>
						</div>
					</div>
				</form>
				
				<?php if(isset($_alert)){ echo $_alert; } ?>
		<?php
			} else {
				echo "<div class='alert alert-info'>Yorum yapmak için giriş yapın</div>";
			}
		?>

		<h3 style="color: #ad1915;">Yorumlar</h3>
			<?php
				if(count($comments) == 0) {
					echo "<div class='alert alert-info'>Henüz yorum yapılmamış</div>";
				} else {
					foreach($comments as $c) {
						if($_SESSION['user_id'] == $c['user_id']) {
							echo "
								<div class=\"row\" id=\"{$c['comment_id']}\" >
									<div class=\"row\" style=\"margin-top: 10px;margin-left: 10px;margin-right: 10px;border:1px solid black;border-radius: 10px;padding:5px 5px 10px 10px\">
										<span>
											<i class=\"fa fa-comment\" style=\"color: #ad1915\"></i>
											<label name=\"namesurname\">{$c['user_name']}:</label>
											<label name=\"date\" style=\"float: right\"><span class=\"fa fa-trash deleteComment\" id=\"{$c['comment_id']}\" style=\"cursor:pointer; font-size: 20px;color:#AD1915\"></span>".date("d.m.Y", $c['comment_time'])."</label>
											<br>
											<label name=\"comment\" style=\"padding-left: 15px\">{$c['comment_text']}</label>
										</span>
									</div>
								</div>
							";
						} else {
							echo "
								<div class=\"row\" >
									<div class=\"row\" style=\"margin-top: 10px;margin-left: 10px;margin-right: 10px;border:1px solid black;border-radius: 10px;padding:5px 5px 10px 10px\">
										<span>
											<i class=\"fa fa-comment\" style=\"color: #ad1915\"></i>
											<label name=\"namesurname\">{$c['user_name']}:</label>
											<label name=\"date\" style=\"float: right\">".date("d.m.Y", $c['comment_time'])."</label>
											<br>
											<label name=\"comment\" style=\"padding-left: 15px\">{$c['comment_text']}</label>
										</span>
									</div>
								</div>
							";
						}
					}
				}
			?>
		</div>

		<?php tmp('footer'); js('delcom.js'); ?>
	</body>
</html>