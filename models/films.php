<?php 

function films_all($link){
	$query = "SELECT * FROM `films`";
	$films = array();
	$result = mysqli_query($link, $query);
	if ($result = mysqli_query($link, $query)) {
		while ($row = mysqli_fetch_array($result)) {
			$films[] = $row;
		}
	}
	
	return $films;
}

function new_film($link, $title, $genre, $year, $description){
	include(ROOT . "functions/resize-photo.php");
	// Запись данных в БД
	$query = "INSERT INTO `films` (title, genre, year, description, photo) VALUES (
		'". mysqli_real_escape_string($link, $title) ."', 
		'". mysqli_real_escape_string($link, $genre) ."', 
		'". mysqli_real_escape_string($link, $year) ."',
		'". mysqli_real_escape_string($link, $description) ."',
		'". mysqli_real_escape_string($link, $db_file_name) ."'
	)";

	if (mysqli_query($link, $query)) {
		$result = true;
	} else {
		die(mysqli_error($link));
		$result = false;
	}

	// echo "$query";

	return $result;
}

function get_film($link, $id){
	$query = "SELECT * FROM `films` WHERE `id` = '". mysqli_real_escape_string($link, $id) ."' LIMIT 1";

	if ($result = mysqli_query($link, $query)) {
		$film = mysqli_fetch_array($result);
	}

	return $film;
}

function update_film($link, $title, $genre, $year, $description, $id){
	// echo "<pre>";
	// print_r($_FILES);
	// echo "</pre>";

	include(ROOT . "functions/resize-photo.php");

	$query = "	UPDATE films 
				SET title = '". mysqli_real_escape_string($link, $title) ."', 
					genre = '". mysqli_real_escape_string($link, $genre) ."', 
					year = '". mysqli_real_escape_string($link, $year) ."', 
					description = '". mysqli_real_escape_string($link, $description) ."', 
					photo = '". mysqli_real_escape_string($link, $db_file_name) ."' 
					WHERE id = ".mysqli_real_escape_string($link, $id)." LIMIT 1";

	if (mysqli_query($link, $query)) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function delete_film($link, $id){
	$query = "DELETE FROM `films` WHERE `id` = '". mysqli_real_escape_string($link, $id) ."' LIMIT 1 ";

	mysqli_query($link, $query);
	
	if (mysqli_affected_rows($link) > 0) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}


 ?>