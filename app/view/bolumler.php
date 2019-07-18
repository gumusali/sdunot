<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bölümler</title>
		<?php
			css('bootstrap-theme.min.css', 'bootstrap.min.css', 'style.css');
		?>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/file/image/favicon.png"/>
	</head>

	<body>
		<?php tmp('header'); ?>
		
	    <div id="bolumler">
			<h2 style="color: #AD1915">Bölümler</h2>
		</div>

		<div class="container fakultecontainer minHeight">
			<div class="row">
				<!--bir önceki sayfaya yönlendirme-->
				<a href="/fakulte"><i style="font-size: 25px; color: #AD1915; float: left; margin-top: -5px; margin-bottom: 15px;" class="fa fa-chevron-circle-left"></i></a>
			</div>

			<div class="row">
				<?php
					if(count($department) > 0) {
						foreach($department as $d) {
							echo "
								<div class=\"col-md-4\">
									<a href=\"/donem/{$depart_sef}/{$d['department_sef']}\">
										<div class=\"fakultekutu\">
											{$d['department_name']}
										</div>
									</a>
								</div>
							";
						}
					} else {
						echo "<div class='alert alert-info'>Ekli bölüm yok</div>";
					}
				?>
			</div>
		</div>

		<?php tmp('footer'); ?>	
	</body>
</html>