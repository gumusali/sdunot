<?php
	$fac   = url(1);
	$dep   = url(2);
	$year  = url(3);
	$term  = url(4);
	$lessons = $_sql->S("*", "lesson as l")->J("department as d")->W("d.department_id = l.department_id	 AND d.department_sef = '{$dep}' AND l.year = '{$year}' AND l.term = '{$term}'")->R(); 

	# include view
	include(view. $controller. '.php');
?>