<?php
	# import css
	function css(){
		$styles = func_get_args();

		if(count($styles) > 0){
			foreach($styles as $style){
				echo "<link rel='stylesheet' type='text/css' href='/app/assets/styles/{$style}'/>";
			}
		}
	}

	# import js
	function js(){
		$scripts = func_get_args();

		if(count($scripts) > 0){
			foreach($scripts as $script){
				echo "<script type='text/javascript' src='/app/assets/js/{$script}'></script>";
			}
		}
	}

	# import tmp page
	function tmp($file = null){
		if($file != null && $file != ''){
			$ext = realpath('.'). "/app/view/tmp/{$file}.php";
			
			if(file_exists($ext))
				include($ext);
		}
	}

	# logo
	function logo(){
		echo "<img src='/file/image/".logo."' />";
	}
?>