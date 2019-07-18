<?php
	if($_POST) {
		$mail  = post('mail');
		$pass  = post('pass');
		$login = $_sql->S("*", "users")->W("user_mail = '{$mail}' AND user_pass = '{$pass}'")->R();
		
		if(count($login) > 0) {
			$_SESSION['user_id'] = $login[0]['user_id'];
			$_SESSION['user_name'] = $login[0]['user_name'];
			$_SESSION['user_mail'] = $login[0]['user_mail'];

			echo "ok";
		} else {
			echo "error";
		}
	}
?>