<?php
	if($_POST && isset($_SESSION['user_id'])) {
		$id  = post('id');
		$doc = $_sql->S("*", "docs")->W("doc_id = '{$id}'")->R();
		$doc = $doc[0];
		
		if($doc['added_by'] == $_SESSION['user_id']) {
			$del = $_sql->D("docs")->W("doc_id = '{$id}'")->R();

			if($del['status'] == "ok") {
				unlink($_SERVER['DOCUMENT_ROOT']. "/file/upload/{$doc['doc_file']}");

				echo "ok";
			} else {
				echo "error";
			}
		} else {
			echo "error";
		}
	}
?>