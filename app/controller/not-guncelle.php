<?php
	if($_POST && isset($_SESSION['user_id'])) {
		# old info
		$id  = url(1);
		$doc = $_sql->S("*", "docs")->W("doc_id = '{$id}'")->R();
		$doc = $doc[0];

		# get new info		
		$ders      = post('ders');
		$aciklama  = post('aciklama');
		$sef       = trim(substr(permalink($aciklama), 0, 10), '-');
		$time      = time();
		
		# update document info
		if($_SESSION['user_id'] == $doc['added_by']) {
			$update = $_sql->U("docs", "doc_name = '{$aciklama}', lesson_id = '{$ders}'")->W("doc_id = '{$id}'")->R();

			if($update['status'] = "ok") {
				$_alert = "<script>swal(\"Başarılı!\", \"Bilgiler güncellendi\", \"success\");</script>";
			} else {
				$_alert = "<script>swal(\"Hata!\", \"Bir hata oluştu. Lütfen tekrar deneyin\", \"error\");</script>";
			}

			if($_FILES['dosya']['name']) {
				$dosya = $_upload->info('dosya')
					->ftype('png', 'jpeg', 'jpg', 'zip', 'pdf', 'rar')
					->name("{$_SESSION['user_id']}{$time}_{$sef}")
					->upload();

				if($dosya['status'] == "ok") {
					$doc_up = $_sql->U("docs", "doc_file = '{$dosya['file_name']}'")->W("doc_id = '{$id}'")->R();

					if($doc_up['status'] == "ok") {
						unlink($_SERVER['DOCUMENT_ROOT']. "/file/upload/{$doc['doc_file']}");
						$_alert = "<script>swal(\"Başarılı!\", \"Dosya güncellendi\", \"success\");</script>";
					} else {
						$_alert = "<script>swal(\"Hata!\", \"Dosya yüklenemedi\", \"error\");</script>";
					}
				}
			}
		} else {
			$_alert = "<script>swal(\"Hata!\", \"Notu sadece yükleyen düzenleyebilir\", \"error\");</script>";
		}
	}

	# get document info
	$id  = url(1);
	$doc = $_sql->S("*", "docs as d")->J("lesson as l")->W("d.doc_id = '{$id}' AND l.lesson_id = d.lesson_id")->R();
	$doc = $doc[0];

	# faculty
	$faculty = $_sql->S("*", "faculty")->R(); 

	# include view
	include(view. $controller. '.php');
?>