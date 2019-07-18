<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Not sil</title>
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
			<div class="panel panel-default">
			 	<div class="panel-heading">Notu silmek için onaylayın</div>
			 	<div class="panel-body">
			 		<form action="" method="post">
						<div class="row">
							<div class="col-md-12">
								<input value="Onayla" name="onayla" class="btn btn-danger btn-outline" type="submit" />
							</div>					
						</div>
					</form>
			 	</div>
			</div>
			
			<?php if(isset($_alert)){ echo $_alert; } ?>
		</div>

		<?php tmp('footer'); ?>
	</body>
</html>