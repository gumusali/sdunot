<?php
	if($_POST) {
		$mail = post('mail');
		$code = encrypt(rand(1000000, 2000000));
		$cont = $_sql->S("*", "users")->W("user_mail = '{$mail}'")->R(true);

		if($cont > 0) {
			$up   = $_sql->U("users", "reset_code = '{$code}'")->W("user_mail = '{$mail}'")->R();

			if($up['status'] == "ok") {
				# send mail
				require_once(getenv("DOCUMENT_ROOT")."/app/classes/phpmailer/class.phpmailer.php");
				require_once(getenv("DOCUMENT_ROOT")."/app/classes/phpmailer/PHPMailerAutoload.php");
				
				# variables
				try {
					$content = "Şifre sıfırlamak için bağlantınız: <a href='http://doktorkod.com/sifre-sifirla/?mail={$mail}&code={$code}'>Şifre Sıfırla</a>";
					
					# phpmailer
					$mailer = new PHPMailer();
					
					# smtp
					$mailer->isSmtp();
					
					# vars
					$mailer->SMTPAuth   = true;
					$mailer->Host       = mail_server;
					$mailer->Port 	    = mail_port;
					$mailer->SMTPSecure = mail_security;
					$mailer->Username   = mail_address;
					$mailer->Password   = mail_pass;
					$mailer->SetFrom($mailer->Username, "SDÜ Not");
					$mailer->AddAddress($mail);
					$mailer->CharSet 	 = 'UTF-8';
					$mailer->Subject 	 = "Şifre Sıfırlama";
					$mailer->MsgHTML($content);
					
					if( $mailer->Send() ) {
						$_alert = "<script>swal('Başarılı!', 'Mail gönderildi', 'success');</script>";
					} else {
						$_alert = "<script>swal('Hata!', 'Mail gönderilirken bir hata oluştu', 'error');</script>";
					}
				}catch (phpmailerException $e) {
					echo $e->errorMessage(); //Pretty error messages from PHPMailer
				}
			} else {
				$_alert = "<script>swal('Hata!', 'Şu anda mail gönderilemiyor', 'error');</script>";
			}
		} else {
			$_alert = "<script>swal('Hata!', 'Mail kayıtlı değil', 'error');</script>";
		}
	}

	# include view
	include(view. $controller. '.php');
?>