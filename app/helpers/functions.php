<?php
	# encrypt
	function encrypt($text = null, $length = 32) {
		if($text == null)
			return false;

		if($length > 32)
			$length = 32;

		return substr(sha1(md5(sha1(md5($text)))), 5, $length);
	}

	# get error
	function get_error($error_code) {
		$errors = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/app/system/errors');
		$parse  = preg_match_all("#(\d\d\d)\|(.*?\n)#i", $errors, $result);
		$return = array();

		for($i = 0; $i < count($result[1]); $i++) {
			$return[$result[1][$i]] = $result[2][$i];
		}

		return $return[$error_code];
	}

	# print alert
	function alert($alert = null) {
		if($alert) {
			if(is_array($alert) && isset($alert)) {
				foreach($alert as $a) {
					echo "<div class='alert {$a['type']}'>{$a['text']}</div>";
				}
			}
		}
	}

	# is empty
	function is_empty() {
		# get parameters
		$args  = func_get_args();
		$empty = true;

		#
		foreach($args as $a) {
			if(empty($a) || $a == '')
				$empty = false;
		}

		#
		return $empty;
	}

	# sort multidimensional array by value
	function sort_multiarray($array = null, $key = null) {
		if($key == null)
			return false;

		if($array == null || !is_array($array))
			return false;

		# sort
		for($i = 0; $i < count($array); $i++) {
			for($j = $i; $j < count($array); $j++) {
				if($array[$i][$key] < $array[$j][$key]) {
					$temp = $array[$i];
					$array[$i] = $array[$j];
					$array[$j] = $temp;
				}
			}
		}

		return $array;
	}

?>