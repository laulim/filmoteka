<?php 

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-func.php');

// DELETE film from DB
if (@$_GET['action'] == 'delete') {
	$result = delete_film($link, $_GET['id']);

	if ($result) {
		$resultInfo = "Фильм был удален!";
	} else {
		$resultError = "Что-то пошло не так.";
	}
}

$films = films_all($link);

include ('views/head.tpl');
include ('views/notifications.tpl'); 
include ('views/index.tpl');
include ('views/footer.tpl');


?>