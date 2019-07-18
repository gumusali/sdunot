<?php
	if($_POST) {
		$mail = get('mail');
		$code = get('code');
		$pas1 = post('pas1');
		$pas2 = post('pas2');

		if($pas1 == $pas2) {
			$code_check = $_sql->S("*", "users")->W("user_mail = '{$mail}' AND reset_code = '{$code}'")->R(true);

			if($code_check > 0) {
				$update = $_sql->U("users", "user_pass = '{$pas1}'")->W("user_mail = '{$mail}' AND reset_code = '{$code}'")->R();
			
				if($update['status'] == "ok") {
					$_alert = "<script>swal('Başarılı!', 'Şifreniz değiştirildi', 'success');</script>";
				} else {
					$_alert = "<script>swal('Hata!', 'Bir hata oluştu', 'error');</script>";
				}
			} else {
				$_alert = "<script>swal('Hata!', 'Kod hatalı', 'error');</script>";
			}
		} else {
			$_alert = "<script>swal('Hata!', 'Girdiğiniz şifreler eşleşmiyor', 'error');</script>";
		}
	}

	# include view
	include(view. $controller. '.php');
?>