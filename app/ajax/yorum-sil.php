<?php
	if(isset($_SESSION['user_id']) && $_POST) {
		$id  = post('id');
		$com = $_sql->S("*", "comments")->W("comment_id = '{$id}'")->R();
		$com = $com[0];

		if($com['user_id'] == $_SESSION['user_id']) {
			$del = $_sql->D("comments")->W("comment_id = '{$id}'")->R();

			if($del['status'] == "ok") {
				echo "ok";
			} else {
				echo "error";
			}
		}
	}
?>