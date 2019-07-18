<?php
	class helpers{
		public static function Load(){
			if($open = opendir($_SERVER['DOCUMENT_ROOT']. '/app/helpers')){
				while($read = readdir($open)){
					if(is_file($_SERVER['DOCUMENT_ROOT']. '/app/helpers/'. $read)){
						include_once($_SERVER['DOCUMENT_ROOT']. '/app/helpers/'. $read);
					}
				}
			}
		}
	}
?>