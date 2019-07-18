<?php
	if($_POST) {
		$doc = post('id');
		$com = $_sql->S("*", "comments")->W("doc_id = '{$doc}'")->R();

		echo json_encode($com);
	}
?>