<?php
	# contact
	if($_POST) {
		if(!isset($_SESSION['contact_limit']))
			$_SESSION['contact_limit'] = 0;

		if(time() - $_SESSION['contact_limit'] > 60) {
			$name 	 = post('name');
			$subject = post('subject');
			$mail 	 = post('mail');
			$message = post('message');
			$ip      = $_SERVER['REMOTE_ADDR'];
			$time    = time();
			$column  = "contact_mail, contact_text, contact_name, contact_time, contact_subject, contact_ip";
			$values  = "'{$mail}', '{$message}', '{$name}', '{$time}', '{$subject}', '{$ip}'";
			$add     = $_sql->I("contact", $column, $values)->R();

			if($add['status'] = "ok") {
				$_alert = "<script>swal(\"Başarılı!\", \"Mesajınız gönderildi\", \"success\");</script>";
				$_SESSION['contact_limit'] = $time;
			} else {
				$_alert = "<script>swal(\"Hata!\", \"Bir hata oluştu. Lüftfen tekrar deneyin\", \"error\");</script>";
			}
		} else {
			$_alert = "<script>swal(\"Hata!\", \"Mesaj göndermek için 60 sn beklemelisiniz\", \"error\");</script>";
		}
	}
	
	# include view
	include(view. $controller. '.php');
?>