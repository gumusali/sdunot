<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Notlar</title>
		<?php
			css('bootstrap-theme.min.css', 'bootstrap.min.css', 'style.css');
		?>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/file/image/favicon.png"/>
	</head>

	<body>
		<?php tmp('header'); ?>

	    <div class="container minHeight" style="min-height: 150px; padding: 20px 0 ;">    	
		    <div id="table" >		    
			    <table class="table table-responsive " >
			      <?php
			     	  if(count($docs) > 0){
			      ?>
			      <tr>
			        <th width="100" style="color: #AD1915;">Dosya Adı</th>
			        <th width="50" style="color: #AD1915;">Tarih</th>
			        <th width="50"></th>
			        <th></th>			        
			      </tr>

			      <?php
			      		}
			      ?>

			      <?php
			      	if(count($docs) > 0) {
			      		foreach($docs as $doc) {
				      		echo "
								<tr>
									<td><a href=\"/not/{$lesson}/{$doc['doc_id']}\" style=\"text-decoration: none;color: #000\">{$doc['doc_name']}</a></td>
									<td>".date("d.m.Y", $doc['doc_time'])."</td>
									<td></td>

									<td width=\"100\">
										<a href='/file/upload/{$doc['doc_file']}'><span class=\"fa fa-download\" style=\"font-size: 20px;color:#000\"></a>
									</td>
								</tr>
				      		";
				      	}
			      	} else {
			      		echo "<div class='alert alert-info'>Ekli not yok</div>";
			      	}
			      ?>			    
			    </table>
		  	</div>
		</div>

		<?php tmp('footer'); ?>
	</body>
</html>