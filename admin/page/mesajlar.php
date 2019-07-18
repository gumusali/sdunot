<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Mesajlar</title>
<?php
	$query = $_sql->S("*", "contact")->R();
?>
<div class="title">Mesajlar</div>
<!-- List -->
<div id="contact">
<?php
	if( COUNT($query) > 0 ) {
		foreach( $query as $k ) {
			echo "
					<div class=\"message\">
						<div class=\"left\">
							<div class=\"line\">
								<div class=\"left1\">ID</div>
								<div class=\"left2\"> # {$k['contact_id']}</div>
							</div>
							
							<div class=\"line\">
								<div class=\"left1\">İsim</div>
								<div class=\"left2\">{$k['contact_name']}</div>
							</div>
							
							<div class=\"line\">
								<div class=\"left1\">E-Posta</div>
								<div class=\"left2\">{$k['contact_mail']}</div>
							</div>
							
							<div class=\"line\">
								<div class=\"left1\">Tarih</div>
								<div class=\"left2\">".date("d/m/y H:i", $k['contact_time'])."</div>
							</div>
							
							<div class=\"line\">
								<div class=\"left1\">IP</div>
								<div class=\"left2\">{$k['contact_ip']}</div>
							</div>
							
							<!-- <div class=\"line\">
								<div class=\"left1\"><a href='/panel/?page=cevapla&id={$k['id']}'>Cevapla</a></div>
								<div class=\"left2\"><a href='/panel/?page=mesaj-sil&id={$k['id']}'>Sil</a></div>
							</div> -->
						</div>
						
						<div class=\"right\">
							<h4>{$k['contact_subject']}</h4><br />
							{$k['contact_text']}
						</div>
					</div>
				 ";
		}
	}
	else
	{
		echo "<div class='info'>Mesaj yok</div>";
	}
?>
		<div class="clear"></div>
	<div id="pagging">
		<?php
			$gap   = 5;
			$start = $page - $gap; if( $start < 1 ){ $start = 1; }
			$end   = $page + $gap; if( $end > $pages ){ $end = $pages; }
			
			# First page
			echo "<a href='/panel/?page=mesajlar&p=1'> << </a>";
			
			# Pages
			for( $i = $start; $i <= $end; $i++ )
			{
				if( $page == $i )
					echo "<a class='active' href='/panel/?page=mesajlar&p={$i}'>{$i}</a>";
				else
					echo "<a href='/panel/?page=mesajlar&p={$i}'>{$i}</a>";
			}
			
			# Last page
			echo "<a href='/panel/?page=mesajlar&p={$pages}'> >> </a>";
		?>
	</div>
</div>
<!-- End List -->