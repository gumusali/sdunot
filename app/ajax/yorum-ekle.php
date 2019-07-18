<?php
	if($_POST) {
		if(!isset($_SESSION['comment_limit'])) { $_SESSION['comment_limit'] = 0; }

		if(time() - $_SESSION['comment_limit'] > 30) {
			$id 	     = post('id');
			$comment 	 = post('comment');
			$time        = time();
			$columns     = "comment_text, user_id, comment_time, doc_id";
			$values      = "'{$comment}', '{$_SESSION['user_id']}', '{$time}', '{$id}'";
			$add_comment = $_sql->I("comments", $columns, $values)->R();

			if($add_comment['status'] == "ok") {
				echo "ok";
				$_SESSION['comment_limit'] = time();
			} else {
				echo "error";
			}
		} else {
			echo "yorum eklemek için 30 sn beklemelisiniz";
		}
	} else {
		echo "error";
	}
?>