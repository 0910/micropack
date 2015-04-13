<?php
  $dbhost = 'localhost';
  $dbuser = 'uo000504_admin';
  $dbpass = '0910.Micro'; // NOTA: Reemplace password por el password de su cuenta de hosting

  $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Ocurrió un error al conectarse al servidor mysql');

  $dbname = 'uo000504_micropack_admin';
  mysql_select_db($dbname) or die ('Ocurrió un error al seleccionar la DB');
?>