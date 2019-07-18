<?php
	$lesson = url(1);
	$docs   = $_sql->S("*", "docs as d")->J("lesson as l")->W("l.lesson_id = d.lesson_id AND l.lesson_sef = '{$lesson}'")->O("d.doc_id DESC")->R();

	# include view
	include(view . $controller . '.php');
?>