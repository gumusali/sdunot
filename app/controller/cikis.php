<?php
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_mail']);
	unset($_SESSION['2fa_mail']);

	redirect('index');
?>