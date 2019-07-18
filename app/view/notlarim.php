<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Notlar</title>
		<?php
			css('bootstrap-theme.min.css', 'bootstrap.min.css', 'style.css');
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/file/image/favicon.png"/>
	</head>

	<body>
		<?php tmp('header'); ?>

	    <div class="container minHeight" style="min-height: 150px; padding: 20px 0 ;">    	
		    <div id="table" >		    
			    <table class="table table-responsive " >
			      <tr>
			        <th width="100" style="color: #AD1915;">Dosya Adı</th>
			        <th width="50"  style="color: #AD1915;">Tarih</th>
			        <th width="100" style="color: #AD1915;"></th>
			        <th width="100" style="color: #AD1915;">İndir</th>
			        <th width="100" style="color: #AD1915;">Güncelle</th>
			        <th width="100" style="color: #AD1915;">Sil</th>	        
			      </tr>

			      <?php
			      	foreach($docs as $doc) {
			      		echo "
							<tr id=\"{$doc['doc_id']}\">
								<td><a href=\"/not/{$doc['lesson_sef']}/{$doc['doc_id']}\" style=\"text-decoration: none;color: #000\">{$doc['doc_name']}</a></td>
								<td>".date("d.m.Y", $doc['doc_time'])."</td>
								<td></td>

								<td width=\"100\">
									<a href='/file/upload/{$doc['doc_file']}' target='_blank'><span class=\"fa fa-download\" style=\"font-size: 20px;color:#000\"></a>
								</td>
								<td width=\"100\">
									<a href='/not-guncelle/{$doc['doc_id']}'><span class=\"fa fa-edit\" style=\"font-size: 20px;color:#0000cc\"></a>
								</td>
								<td width=\"100\">
									<span class=\"fa fa-trash deleteDocument\" id=\"{$doc['doc_id']}\" style=\"cursor:pointer; font-size: 20px;color:#AD1915\">
								</td>
							</tr>
			      		";
			      	}
			      ?>			    
			    </table>
		  	</div>
		</div>

		<?php tmp('footer'); js('deldoc.js'); ?>
	</body>
</html>