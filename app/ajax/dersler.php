<?php
	if($_POST) {
		$dep = post('department');
		$sem = post('semester');
		$exp = explode("-", $sem);
		$get = $_sql->S("*", "lesson")->W("year = '{$exp[0]}' AND term = '{$exp[1]}' AND department_id = '{$dep}'")->O("lesson_name ASC")->R();

		echo "<option value=\"\" disabled selected>Ders seçin</option>";

		foreach($get as $g) {
			echo "<option value='{$g['lesson_id']}'>{$g['lesson_name']}</option>";
		}
	}
?>