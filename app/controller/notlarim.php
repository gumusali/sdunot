<?php
	if(isset($_SESSION['user_id'])) {
		$user = $_SESSION['user_id'];
		$docs = $_sql->S("*", "docs as d")->J("lesson as l")->W("l.lesson_id = d.lesson_id AND d.added_by = '{$user}'")->O("d.doc_id DESC")->R();
	} else {
		redirect('giris');
	}

	# include view
	include(view. $controller. '.php');
?>