<?php
	# if alredy logged in
	if(isset($_SESSION['user_id']))
		redirect('index');

	# register
	if($_POST) {
		$name = post('name');
		$surn = post('surname');
		$user = post('username');
		$mail = post('email');
		$pass = post('pass'); 
		$pas2 = post('pass2');
		$name = $name.' '. $surn;
		$empty= is_empty($name, $surn, $user, $mail, $pass, $pas2);

		if($empty) {
			if($pass == $pas2) {
				$check = $_sql->S("*", "users")->W("user_mail = '{$mail}'")->R(true);

				if($check <= 0) {
					$col = "user_mail, user_name, user_pass, 2fa_secret, reset_code";
					$val = "'{$mail}', '{$name}', '{$pass}', '', ''";
					$add = $_sql->I("users", $col, $val)->R();

					if($add['status'] == "ok") {
						$_alert = "<script>swal(\"Başarılı!\", \"Kayıt yapıldı. Giriş yapabilirsiniz\", \"success\").then(function(){window.location.href='/giris'});</script>";	
					} else {
						$_alert = "<script>swal(\"Hata!\", \"Mail kayıtlı\", \"error\");</script>";		
					}
				} else {
					$_alert = "<script>swal(\"Hata!\", \"Mail kayıtlı\", \"error\");</script>";	
				}
			} else {
				$_alert = "<script>swal(\"Hata!\", \"Şifreler eşleşmiyor\", \"error\");</script>";
			}
		} else {
			$_alert = "<script>swal(\"Hata!\", \"Tüm alanları doldurun\", \"error\");</script>";
		}
	}

	# facebook register
	use Facebook\Facebook;
	include $_SERVER['DOCUMENT_ROOT']. '/app/classes/Facebook/autoload.php';

	$fb = new Facebook([
		'app_id' => '1061831487315880',
		'app_secret' => '63880a0f0d9a8669ae61d7c7fd55ba06',
		'default_graph_version' => 'v2.2',
	]);

	$helper      = $fb->getRedirectLoginHelper();
	$permissions = ['email'];
	$loginUrl    = $helper->getLoginUrl('http://localhost/fb-callback-signup', $permissions);

	# google login
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/vendor/autoload.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/Client.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/AccessToken/Verify.php');

	#
	$oauth_credentials = $_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/client.json'; 
	$redirect_uri = 'http://localhost/gl-callback-signup';

	$Google = new Google_Client();
	$Google->setAuthConfig($oauth_credentials);
	$Google->setRedirectUri($redirect_uri);
	$Google->setScopes(array(
	    "https://www.googleapis.com/auth/plus.login",
	    "https://www.googleapis.com/auth/userinfo.email",
	    "https://www.googleapis.com/auth/userinfo.profile"
	));
	
	$google_login_url = $Google->createAuthUrl();

	# include view
	include(view. $controller. '.php');
?>