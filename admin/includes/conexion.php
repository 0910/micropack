<?php	
	function conectar(){
		$db_con = mysql_connect (DB_SERVER,DB_USER,DB_PASS) or die ('Error conectando al servidor MySQL');
		if (!$db_con) return false;
		if (!mysql_select_db (DB_NAME, $db_con)) return false;
		return $db_con;
	}
?>
