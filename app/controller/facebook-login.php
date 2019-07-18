<?php
	use Facebook\Facebook; 

	include $_SERVER['DOCUMENT_ROOT']. '/app/classes/Facebook/autoload.php';


	$fb = new Facebook([
	  'app_id' => '1061831487315880', // Replace {app-id} with your app id
	  'app_secret' => '',
	  'default_graph_version' => 'v2.2',
	]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('http://localhost/fb-callback.php', $permissions);

	echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>
