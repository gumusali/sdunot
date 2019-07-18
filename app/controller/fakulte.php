<?php
	# fakülteler
	$faculty = $_sql->S("*", "faculty")->R();

	# include view
	include(view. $controller. '.php');
?>