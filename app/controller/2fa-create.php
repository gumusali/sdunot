<?php
	# google 2fa
	require_once $_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/GoogleAuthenticator.php';

	#
	$ga        = new GoogleAuthenticator();

	# secret check
	$query = $_sql->S("*", "users")->W("user_mail = '{$_SESSION['2fa_mail']}'")->R();

	if(count($query) > 0 && $query[0]['2fa_secret'] != '') {
		$secret = $query[0]['2fa_secret'];
	} else {
		$secret = $ga->createSecret();

		# update secret
		$_sql->U("users", "2fa_secret = '{$secret}'")->W("user_mail = '{$_SESSION['2fa_mail']}'")->R();
	}

	# qr code	
	$qrCodeUrl = $ga->getQRCodeGoogleUrl($_SESSION['2fa_mail'], $secret, 'Üninot');

	#
	include(view. $controller. '.php');
?>