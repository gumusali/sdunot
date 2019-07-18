<?php
	if($_POST) {
		$faculty  = post('faculty');
		$deps     = $_sql->S("*", "department")->W("faculty_id = '{$faculty}'")->O("department_name ASC")->R();

		echo "<option value=\"\" disabled selected>Bölüm seçin</option>";

		foreach($deps as $d) {
			echo "<option value='{$d['department_id']}'>{$d['department_name']}</option>";
		}
	}
?>