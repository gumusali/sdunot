<?php
	if($_POST) {
		$fakulte   = post('fakulte');
		$donem     = post('donem');
		$bolum     = post('bolum');
		$ders      = post('ders');
		$aciklama  = post('aciklama');
		$sef       = trim(substr(permalink($aciklama), 0, 10), '-');
		$time      = time();

		$dosya = $_upload->info('dosya')
				->ftype('png', 'jpeg', 'jpg', 'zip', 'pdf', 'rar')
				->name("{$_SESSION['user_id']}{$time}_{$sef}")
				->upload();

		if($dosya['status'] == "ok") {
			$ekle = $_sql->I("docs", "doc_name, doc_file, doc_time, added_by, lesson_id", "'{$aciklama}', '{$dosya['file_name']}', '{$time}', '{$_SESSION['user_id']}', '{$ders}'")->R();

			if($ekle['status'] == "ok") {
				$_alert = "<script>swal(\"Başarılı!\", \"Not Eklendi\", \"success\");</script>";
			} else {
				$_alert = "<script>swal(\"Hata!\", \"Tekrar deneyin\", \"error\");</script>";
			}
		}
	}


	# fakülteler
	$fakulteler = $_sql->S("*", "faculty")->O("faculty_name ASC")->R();

	# include view
	include(view. $controller. '.php');
?>