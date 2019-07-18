<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Bölümler</title>
<?php
	# 
	$query = $_sql->S("*", "department")->O("department_id DESC")->R();
?>
<div class="title">Bölümler</div>
<!-- List -->
<div id="list">
<?php
	if( COUNT($query) > 0 ) {
		foreach( $query as $k ) {
			echo "
					<div class=\"line\">
						<div class=\"list_id\">#{$k['department_id']}</div>
						<div class=\"list_nm\">{$k['department_name']}</div>
						<!--<a href='/panel/?page=bolum-duzenle&id={$k['department_id']}'><div class=\"edit\"></div></a>
						<a href='/panel/?page=bolum-sil&id={$k['department_id']}'><div class=\"del\"></div></a>-->
					</div>
				 ";
		}
	} else {
		echo "<div class='info'>Bölüm yok</div>";
	}
?>
	<div class="clear"></div>
</div>
<!-- End List -->