<?php if( !isset($_SESSION['root_login']) ){ exit(); } ?>
<title>Ana Sayfa Kategori</title>
<?php
	# Class
	$sql 	= $GLOBALS['sql'];
	$fun 	= $GLOBALS['function'];
	# Variables
	if($_POST){
		for($i=1; $i<41; $i++){
			$sql->U("menu_kategori", "k_id = '{$_POST[$i]}'")->W("id = '{$i}'")->R();
		}
	}
?>
<!-- Form -->
<div id="form">
	<div class="title">Ana Sayfa Kategori</div>
	
	<form action="" method="post" >
		<div class="form">
			<?php
				$kategoriler = $sql->S("*", "menu_kategori")->R();

				foreach($kategoriler as $k){
					echo "
						<div class=\"line\">
							<div class=\"left\">{$k['id']}. Sıra</div>
							<div class=\"right\"><input type=\"text\" name=\"{$k['id']}\" value=\"{$k['k_id']}\" /></div>
						</div>
					 ";
				}				
			?>
	
			<div class="line">
				<input type="submit" value="Kaydet" />
			</div>
		</div>
	</form>
</div>
<!-- End Form -->