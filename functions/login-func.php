<?php 
function isAdmin(){

	if (isset($_SESSION['status'])) {
		if ($_SESSION['status'] == 'admin'){
			return true;
		} else {
			return false;
		}
	}
}

function loginCheck($link, $login) {
	$userData = array();
	$query = "SELECT * FROM `users` WHERE `login` = '" . mysqli_real_escape_string($link, $login) ."' LIMIT 1";
	if ($result = mysqli_query($link, $query)) {
		$userData = mysqli_fetch_array($result);
	} 
	return $userData;
}
 ?>