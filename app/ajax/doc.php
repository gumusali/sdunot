<?php
	if($_POST) {
		$id = post('id');
		$com = $_sql->S("*", "docs as d")->
				  J("lesson as l")->
				  J("faculty as f")->
				  J("department as dep")->
				  W("d.doc_id = '{$id}' AND d.lesson_id = l.lesson_id AND l.department_id = dep.department_id AND dep.faculty_id = f.faculty_id")->R();
		
		echo json_encode($com);
	}
?>