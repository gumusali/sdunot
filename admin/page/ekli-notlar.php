<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Notlar</title>
<?php
	# 
	$query = $_sql->S("*", "docs as d")->J("users as u")->W("u.user_id = d.added_by")->O("d.doc_id DESC")->R();
?>
<div class="title">Notlar</div>
<!-- List -->
<div id="list">
<?php
	if( COUNT($query) > 0 ) {
		foreach( $query as $k ) {
			echo "
					<div class=\"line\">
						<div class=\"list_id\">#{$k['doc_id']}</div>
						<div class=\"list_nm\">{$k['doc_name']} | {$k['user_name']}</div>
						<!--<a href='/panel/?page=bolum-duzenle&id={$k['department_id']}'><div class=\"edit\"></div></a>
						<a href='/panel/?page=bolum-sil&id={$k['department_id']}'><div class=\"del\"></div></a>-->
					</div>
				 ";
		}
	} else {
		echo "<div class='info'>Not yok</div>";
	}
?>
	<div class="clear"></div>
</div>
<!-- End List -->