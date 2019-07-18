<?php
	# start session
	session_start();

	# set timezone
	date_default_timezone_set("Europe/Istanbul");

	# load init
	require_once('app/init.php');

	# url
	$url = url(0);

	if(isset($url) && $url != ''){
		$controller = $url;
	}else{
		$controller = 'index';
	}

	# include controller
	$_inc = controller . $controller . '.php';

	if(file_exists($_inc)){
		include_once($_inc);
	}else{
		redirect('404');
	}
?>