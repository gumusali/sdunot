<?php
	#
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/vendor/autoload.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/Client.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/AccessToken/Verify.php');

	#
	$oauth_credentials = $_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/client.json'; 
	$redirect_uri = 'http://localhost/gl-callback-signup';
	 
	$Google = new Google_Client();
	$Google->setAuthConfig($oauth_credentials);
	$Google->setRedirectUri($redirect_uri);
	// $this->Google->setScopes('email');
	$Google->setScopes(array(
	    "https://www.googleapis.com/auth/plus.login",
	    "https://www.googleapis.com/auth/userinfo.email",
	    "https://www.googleapis.com/auth/userinfo.profile"
	));

	if (isset($_GET['code'])){
	    $token = $Google->fetchAccessTokenWithAuthCode($_GET['code']);
	    $Google->setAccessToken($token);
	 
	    // store in the session also
	    $_SESSION['google_access_token'] = $token;
	 
	    $Google->setAccessToken($_SESSION['google_access_token']);
	 
	    if ($Google->getAccessToken())
	    {
	        $token_data = $Google->verifyIdToken();
	 		// name, email, sub
	        $get = $_sql->S("*", "users")->W("user_mail = '{$token_data['email']}'")->R(true);
			
			if($get > 0) {
				echo "Bu hesap kayıtlı. <a href='/giris'>Giriş sayfasına git</a>";
			} else {
				$add = $_sql->I("users", "user_name, user_mail, user_pass", "'{$token_data['name']}', '{$token_data['email']}', '{$token_data['sub']}'")->R();
			
				if($add['status'] == "ok") {
					redirect('giris');
				} else {
					echo "Bir hata oluştu. <a href='/kayit'>Kayıt sayfasına dön</a>";
				}
			}
	    }
	} else {
		echo "Bir hata oluştu. Tekrar kayıt sayfasına dönün: <a href='/kayit'>Kayıt</a>";
	}
?>