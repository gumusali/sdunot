<?php
	if($_POST) {
		$dep = post('department');
		$get = $_sql->S("*", "department")->W("department_id = '{$dep}'")->R();
		$yrs = $get[0]['semester'];

		echo "<option value=\"\" disabled selected>Sınıf seçin</option>";

		for($i = 1; $i <= $yrs; $i++) {
			for($j = 1; $j <=2; $j++) {
				echo "<option value='{$i}-{$j}'>{$i}. sınıf {$j}. Dönem</option>";
			}
		}
	}
?>