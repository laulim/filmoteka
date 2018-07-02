<?php 

require('config.php');
require('database.php');
$link = db_connect();

include('functions/login-func.php');

if (isset($_POST['enter'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];
	$userData = loginCheck($link, $login);

	if ($userData['login'] == $login) {
		if ($userData['password'] == $password) {
			$_SESSION['status'] = $userData['status'];
			header('Location: ' . HOST . 'index.php');
		} else {
			$resultInfo = "Вы ввели неверный логин или пароль. Попробуйте еще раз.";
		}
	} else {
		$resultInfo = "Вы ввели неверный логин или пароль. Попробуйте еще раз.";
	}	
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>";
// print_r($userData);
// echo "</pre>";

include ('views/head.tpl'); 
include ('views/notifications.tpl'); 
include ('views/login.tpl'); 
include ('views/footer.tpl');
 ?>