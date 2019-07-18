<?php
	# autoload
	function __autoload($class){
		if(file_exists($_SERVER['DOCUMENT_ROOT']. "/app/classes/class.{$class}.php")){
			require_once($_SERVER['DOCUMENT_ROOT']. "/app/classes/class.{$class}.php");
		}
	}

	# classes
	$_sql 	  = new sql();
	$_upload  = new upload();

	# helpers
	helpers::Load();
?>