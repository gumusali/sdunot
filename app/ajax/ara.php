<?php
	if($_POST) {
		$srch = post('search');

		# documents
		$docs = $_sql->S("*", "docs as d")->J("lesson as l")->W("l.lesson_id = d.lesson_id AND d.doc_name")->LK("%{$srch}%")->R();
		
		# search lessons
		$less = $_sql->S("*", "lesson")->W("lesson_name")->LK("%{$srch}%")->R();

		echo json_encode(array("ders"=> $less, "not"=> $docs));
	}
?>