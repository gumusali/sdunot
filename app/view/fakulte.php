<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Fakülteler</title>
		<?php
			css('bootstrap-theme.min.css', 'bootstrap.min.css', 'style.css');
		?>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/file/image/favicon.png"/>
	</head>

	<body>
		<?php tmp('header'); ?>
		
	    <div id="bolumler">
			<h2 style="color: #AD1915">Fakülteler</h2>
		</div>

		<div class="container fakultecontainer minHeight">
			<div class="row">
				<?php
					foreach($faculty as $f) {
						echo "
							<div class=\"col-md-4\">
								<a href=\"/bolumler/{$f['faculty_sef']}\">
									<div class=\"fakultekutu\">
										{$f['faculty_name']}
									</div>
								</a>
							</div>
						";
					}
				?>
			</div>
		</div>

		<?php tmp('footer'); ?>
	</body>
</html>