<?php
	$faculty    = url(1);
	$department = url(2);
	$info       = $_sql->S("*", "department")->W("department_sef = '{$department}'")->R();
	$info       = $info[0];

	# include view
	include(view. $controller. '.php');
?>