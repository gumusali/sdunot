<?php
	if($_POST) {
		$query = $_sql->S("*", "faculty")->O("faculty_name ASC")->R();

		echo json_encode($query);
	}
?>