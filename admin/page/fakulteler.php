<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Fakülteler</title>
<?php
	# 
	$query = $_sql->S("*", "faculty")->O("faculty_id DESC")->R();
?>
<div class="title">Fakülteler</div>
<!-- List -->
<div id="list">
<?php
	if( COUNT($query) > 0 ) {
		foreach( $query as $k ) {
			echo "
					<div class=\"line\">
						<div class=\"list_id\">#{$k['faculty_id']}</div>
						<div class=\"list_nm\">{$k['faculty_name']}</div>
						<a href='/admin/?page=fakulte-duzenle&id={$k['faculty_id']}'><div class=\"edit\"></div></a>
						<!--<a href='/admin/?page=fakulte-sil&id={$k['faculty_id']}'><div class=\"del\"></div></a>-->
					</div>
				 ";
		}
	} else {
		echo "<div class='info'>Fakülte yok</div>";
	}
?>
	<div class="clear"></div>
</div>
<!-- End List -->