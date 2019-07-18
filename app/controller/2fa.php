<?php
	#
	require_once $_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/GoogleAuthenticator.php';

	#
	$ga        = new GoogleAuthenticator();
	$get       = $_sql->S("*", "users")->W("user_mail = '{$_SESSION['2fa_mail']}'")->R();
	$get       = $get[0];
	// $qrCodeUrl = $ga->getQRCodeGoogleUrl($_SESSION['2fa_mail'], $get['2fa_secret'], 'Üninot');

	if($_POST) {
		$checkResult = $ga->verifyCode($get['2fa_secret'], post('secret'));

		if($checkResult === true) {
			$_SESSION['user_id']   = $get['user_id'];
			$_SESSION['user_name'] = $get['user_name'];
			$_SESSION['user_mail'] = $get['user_mail'];

			redirect('index');
		} else {
			$_alert = "<script>swal(\"Hata!\", \"Kod hatalı\", \"error\");</script>";
		}
	}

	#
	include(view. $controller. '.php');
?>