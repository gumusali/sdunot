<?php
	# document
	$id  = url(2);
	$doc = $_sql->S("*", "docs as d")->
				  J("lesson as l")->
				  J("faculty as f")->
				  J("department as dep")->
				  W("d.doc_id = '{$id}' AND d.lesson_id = l.lesson_id AND l.department_id = dep.department_id AND dep.faculty_id = f.faculty_id")->R();
	$doc = $doc[0];

	# add comment
	if($_POST) {
		if(!isset($_SESSION['comment_limit'])) { $_SESSION['comment_limit'] = 0; }

		if(time() - $_SESSION['comment_limit'] > 30) {
			$comment 	 = post('comment');
			$time        = time();
			$columns     = "comment_text, user_id, comment_time, doc_id";
			$values      = "'{$comment}', '{$_SESSION['user_id']}', '{$time}', '{$id}'";
			$add_comment = $_sql->I("comments", $columns, $values)->R();

			if($add_comment['status'] == "ok") {
				$_alert = "<script>swal(\"Başarılı!\", \"Yorumunuz Eklendi\", \"success\");</script>";
				$_SESSION['comment_limit'] = time();
			} else {
				$_alert = "<script>swal(\"Hata!\", \"Tekrar deneyin\", \"error\");</script>";
			}
		} else {
			$_alert = "<script>swal(\"Hata!\", \"Tekrar yorum eklemeniz için 30 sn beklemelisiniz\", \"error\");</script>";
		}
	}

	# comments
	$comments = $_sql->S("*", "comments as c")->J("users as u")->W("c.doc_id = '{$id}' AND u.user_id = c.user_id")->O("c.comment_id DESC")->R();

	# include view
	include(view. $controller. '.php');
?>