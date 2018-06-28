<?php 

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');

// DELETE film from DB
if (@$_GET['action'] == 'delete') {
	$result = delete_film($link, $_GET['id']);

	if ($result) {
		$resultInfo = "Фильм был удален!";
	} else {
		$resultError = "Что-то пошло не так.";
	}
}

$film = get_film($link, $_GET['id']);

include ('views/head.tpl'); 
include ('views/notifications.tpl'); 
include ('views/single-film.tpl');
include ('views/footer.tpl');


?>