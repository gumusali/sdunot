<?php
	if(isset($_SESSION['user_id']) && $_POST) {
		$user = $_SESSION['user_id'];
		$docs = $_sql->S("*", "docs as d")->J("lesson as l")->W("l.lesson_id = d.lesson_id AND d.added_by = '{$user}'")->R();
		
		echo json_encode($docs);
	}
?>