<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Üyeler</title>
<?php
	#
	$query = $_sql->S("*", "users")->R();
?>
<div class="title">Üyeler</div>
<!-- List -->
<div id="user">
<?php
	if( COUNT($query) > 0 ){
		foreach( $query as $k ) {
			echo "
					<div class=\"user\">
						<div class=\"line\">
							<div class=\"left1\">ID</div>
							<div class=\"left2\"># {$k['user_id']}</div>
						</div>
						
						<div class=\"line\">
							<div class=\"left1\">İsim</div>
							<div class=\"left2\">{$k['user_name']}</div>
						</div>
						
						<div class=\"line\">
							<div class=\"left1\">E-Posta</div>
							<div class=\"left2\">{$k['user_mail']}</div>
						</div>
					</div>
				 ";
		}
	}
	else
	{
		echo "<div class='info'>Üye yok</div>";
	}
?>
		<div class="clear"></div>
</div>
<!-- End List -->