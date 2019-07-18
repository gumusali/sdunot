<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dönemler</title>
		<?php
			css('bootstrap-theme.min.css', 'bootstrap.min.css', 'style.css');
		?>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/file/image/favicon.png"/>
	</head>

	<body>
		<?php tmp('header'); ?>
		
	    <div id="bolumler">
			<h2 style="color: #AD1915">Dönemler</h2>
		</div>

		<div class="container fakultecontainer minHeight">
			<div class="row">
				<!--bir önceki sayfaya yönlendirme-->
				<a href="/bolumler/<?=$faculty?>"><i style="font-size: 25px; color: #AD1915; float: left; margin-top: -5px; margin-bottom: 15px;" class="fa fa-chevron-circle-left"></i></a>
			</div>

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
				<?php
					for($i = 1; $i <= $info['semester']; $i++) {
						echo "<div class=\"row\">";
						
						for($j = 1; $j <= 2; $j++) {
							echo "
								<a href=\"/dersler/{$faculty}/{$department}/{$i}/{$j}\">
									<div class=\"col-md-6\">
										<div class=\"fakultekutu\">
											{$i}. Sınıf {$j}. Dönem Dersleri
										</div>
									</div>
								</a>
							";
						}

						echo "</div>";
					}
				?>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>

		<?php tmp('footer'); ?>	
	</body>
</html>