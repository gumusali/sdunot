<?php
	# if alredy looged in
	if(isset($_SESSION['user_id']))
		redirect('index');

	# login
	if($_POST) {
		$mail  = post('mail');
		$pass  = post('pass');
		$rme   = post('remember-me');
		$login = $_sql->S("*", "users")->W("user_mail = '{$mail}' AND user_pass = '{$pass}'")->R();

		if(count($login) > 0) {
			# set cookie remember me
			if($rme == 'on' && !isset($_COOKIE['mail'])) {
				setcookie('mail', $mail);
				setcookie('pass', $pass);
				setcookie('rme', 'checked');
			}

			#
			$_SESSION['user_id'] = $login[0]['user_id'];
			$_SESSION['user_name'] = $login[0]['user_name'];
			$_SESSION['user_mail'] = $login[0]['user_mail'];
			// $_SESSION['2fa_mail'] = $login[0]['user_mail'];
			redirect('index');
			// if($login[0]['2fa_secret'] != '') {
			// 	redirect('2fa');
			// } else {
			// 	redirect('2fa-create');
			// }
		} else {
			$_alert = "<script>swal(\"Hata!\", \"E-Posta ya da şifre hatalı\", \"error\");</script>";
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
	$loginUrl    = $helper->getLoginUrl('http://localhost/fb-callback', $permissions);

	# google login
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/vendor/autoload.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/Client.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/AccessToken/Verify.php');

	#
	$oauth_credentials = $_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/client.json'; 
	$redirect_uri = 'http://localhost/gl-callback';

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