<?php
	$depart_sef = url(1);
	$department = $_sql->S("*", "department as d")->J("faculty as f")->W("f.faculty_id = d.faculty_id AND f.faculty_sef = '{$depart_sef}'")->R();

	# include view
	include(view. $controller. '.php');
?>