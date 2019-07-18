<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Kitaplar</title>
<?php
	# Class
	$sql 	= $GLOBALS['sql'];
	$fun 	= $GLOBALS['function'];
	# Class
	$page  = $fun->filter('get','p'); if( !is_numeric($page) ){ $page = 1; }
	$limit = 50;
	$total = $sql->S("*","kitaplar")->R(true);
	$pages = ceil( $total / $limit ); if( $page > $pages ){ $page = 1; }
	$first = ( $page * $limit ) - $limit;
	$query = $sql->S("*","kitaplar")->O("id DESC")->LT("{$first},{$limit}")->R();
?>
<div class="title">Kitaplar</div>
<!-- List -->
<input type="text" id="kitap_bul" style="width: 100%;text-align:center;height:30px;border:solid 1px #DDD;margin:10px 0" placeholder="Kitap, ISBN">
<div id="list">
<?php
	if( COUNT($query) > 0 )
	{
		foreach( $query as $k )
		{
			echo "
					<div class=\"line\">
						<div class=\"list_id\">#{$k['id']}</div>
						<div class=\"list_nm\">{$k['kitap']}</div>
						<a href='/panel/?page=kitap-sil&id={$k['id']}'><div class=\"del\"></div></a>
						<a href='/panel/?page=kitap-duzenle&id={$k['id']}'><div class=\"edit\"></div></a>
					</div>
				 ";
		}
	}
	else
	{
		echo "<div class='info'>Ekli kitap bulunamadı</div>";
	}
?>
		<div class="clear"></div>
	<div id="pagging">
		<?php
			$gap   = 5;
			$start = $page - $gap; if( $start < 1 ){ $start = 1; }
			$end   = $page + $gap; if( $end > $pages ){ $end = $pages; }
			
			# First page
			echo "<a href='/panel/?page=kitaplar&p=1'> << </a>";
			
			# Pages
			for( $i = $start; $i <= $end; $i++ )
			{
				if( $page == $i )
					echo "<a class='active' href='/panel/?page=kitaplar&p={$i}'>{$i}</a>";
				else
					echo "<a href='/panel/?page=kitaplar&p={$i}'>{$i}</a>";
			}
			
			# Last page
			echo "<a href='/panel/?page=kitaplar&p={$pages}'> >> </a>";
		?>
	</div>
</div>
<!-- End List -->