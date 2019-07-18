<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Ödeme Bildirimleri</title>
<?php
	# Class
	$sql 	= $GLOBALS['sql'];
	$fun 	= $GLOBALS['function'];
	# Class
	$query  = $sql->S("*", "odeme_bildirim")->O("odeme_id ASC")->R();
?>
<div class="title">Ödeme Bildirimleri</div>
<!-- List -->
<div id="list">
<?php
	if( COUNT($query) > 0 )
	{
		foreach( $query as $k )
		{
			echo "
					<div class=\"line\">
						<div class=\"list_id\">#{$k['odeme_id']}</div>
						<div class=\"list_nm\">{$k['odeme_siparis']} | {$k['odeme_isim']}</div>
						<a href='/panel/?page=odeme-detay&id={$k['odeme_id']}'>Detay</a>
					</div>
				 ";
		}
	}
	else
	{
		echo "<div class='info'>Ödeme yok</div>";
	}
?>
		<div class="clear"></div>
</div>
<!-- End List -->