<?php
	# define constants
	define('url', $_SERVER['SERVER_NAME']);
	define('view', realpath('.') .'/app/view/');
	define('controller', realpath('.'). '/app/controller/');

	# set ini
	ini_set('upload_max_filesize', '10M');
?>