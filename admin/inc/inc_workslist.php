<?php

	// Cargo la lista de trabajos para el menu
	$query = "SELECT id, title, category, order_by FROM works ORDER BY order_by DESC"; 
	$arrWorks = array();
	$resultado = mysql_query($query, $dbConn);
	while ($row = mysql_fetch_assoc($resultado)){
		array_push($arrWorks,$row);
	}
	foreach ($arrWorks as $work){
		$id = $work['id'];
		$title = $work['title'];
		$category = $work['category'];

		if($category == 0){
			$works_fineart .= '<a href="works.php?id='.$id.'" id="'.$id.'">'.$title.'</a>';
		}
		if($category == 1){
			$works_music .= '<a href="works.php?id='.$id.'" id="'.$id.'">'.$title.'</a>';
		} 
		if($category == 2){
			$works_fashion .= '<a href="works.php?id='.$id.'" id="'.$id.'">'.$title.'</a>';
		} 
		if($category == 3){
			$works_identity .= '<a href="works.php?id='.$id.'" id="'.$id.'">'.$title.'</a>';
		}  
	}
?>