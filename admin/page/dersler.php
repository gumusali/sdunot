<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Dersler</title>
<?php
	# 
	$query = $_sql->S("*", "lesson")->O("lesson_id DESC")->R();
?>
<div class="title">Dersler</div>
<!-- List -->
<div id="list">
<?php
	if( COUNT($query) > 0 ) {
		foreach( $query as $k ) {
			echo "
					<div class=\"line\">
						<div class=\"list_id\">#{$k['lesson_id']}</div>
						<div class=\"list_nm\">{$k['lesson_name']}</div>
						<a href='/admin/?page=ders-duzenle&id={$k['lesson_id']}'><div class=\"edit\"></div></a>
						<!--<a href='/admin/?page=ders-sil&id={$k['lesson_id']}'><div class=\"del\"></div></a>-->
					</div>
				 ";
		}
	} else {
		echo "<div class='info'>Ders yok</div>";
	}
?>
	<div class="clear"></div>
</div>
<!-- End List -->