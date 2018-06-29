<?php 

require('config.php');

$_SESSION = array();
if (isset($_COOKIE['PHPSESSID'])) {
	setcookie('PHPSESSID', '', time() - 60, '/');
}

header('Location: ' . HOST . 'index.php');


 ?>