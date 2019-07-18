<?php
	if($_POST) {
		$srch = post('search');
		
		# search documents
		$docs = $_sql->S("*", "docs as d")->J("lesson as l")->W("l.lesson_id = d.lesson_id AND d.doc_name")->LK("%{$srch}%")->O("d.doc_id DESC")->R();
	
		# search lessons
		$less = $_sql->S("*", "lesson")->W("lesson_name")->LK("%{$srch}%")->R();
	}

	# include view
	include(view. $controller. '.php');
?>