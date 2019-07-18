<?php
	#
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/vendor/autoload.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/Client.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/AccessToken/Verify.php');

	#
	$oauth_credentials = $_SERVER['DOCUMENT_ROOT']. '/app/classes/Google/Google/client.json'; 
	$redirect_uri = 'http://localhost/gl-callback';
	 
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
	        $get = $_sql->S("*", "users")->W("user_mail = '{$token_data['email']}'")->R();

	        if(count($get) > 0) {
	        	$_SESSION['user_id']   = $get[0]['user_id'];
	        	$_SESSION['user_mail'] = $get[0]['user_mail'];
				$_SESSION['user_name'] = $get[0]['user_name'];

				redirect('index');
	        } else {
	        	echo "Bir hata oluştu. Tekrar girişe dönün: <a href='/giris'>Giriş</a> ya da google ile kayıt olun:  <a href='/kayit'>Kayıt</a>";
	        }
	    }
	} else {
		echo "Bir hata oluştu. Tekrar girişe dönün: <a href='/giris'>Giriş</a>";
	}
?>