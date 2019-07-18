<?php
	if($_POST && isset($_SESSION['user_id'])) {
		$id  = url(1);
		$doc = $_sql->S("*", "docs")->W("doc_id = '{$id}'")->R();
		$doc = $doc[0];
		
		if($doc['added_by'] == $_SESSION['user_id']) {
			$del = $_sql->D("docs")->W("doc_id = '{$id}'")->R();

			if($del['status'] == "ok") {
				unlink($_SERVER['DOCUMENT_ROOT']. "/file/upload/{$doc['doc_file']}");

				$_alert = "<script>swal(\"Başarılı!\", \"Not silindi\", \"success\");</script>";
			} else {
				$_alert = "<script>swal(\"Hata!\", \"Bir sorun oluştu\", \"error\");</script>";
			}
		} else {
			$_alert = "<script>swal(\"Hata!\", \"Notu sadece ekleyen silebilir\", \"error\");</script>";
		}
	}
	
	# include view
	include(view. $controller. '.php');
?>