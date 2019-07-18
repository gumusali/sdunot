<?php
	if(url(1) != ''){
		$dir = $_SERVER['DOCUMENT_ROOT']. '/app/ajax/' . url(1) . '.php';

		if(file_exists($dir))
			require $dir;
	}
?>