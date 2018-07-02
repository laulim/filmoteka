<?php 

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-func.php');

// UPDATE form data to DB
if (array_key_exists('update-film', $_POST)) {
	// Обработка ошибок
	if ($_POST['title'] == '') {
		$errors[] = "Необходимо ввести название фильма!";
	}
	if ($_POST['genre'] == '') {
		$errors[] = "Необходимо ввести жанр фильма!";
	}
	if ($_POST['year'] == '') {
		$errors[] = "Необходимо ввести год фильма!";
	}

	// Если ошибок нет - сохраняем фильм
	if (empty($errors)) {
		// Запись данных в БД
		$result = update_film($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $_GET['id']);

		if ($result) {
			$resultInfo = "Фильм был успешно отредактирован!";
		} else {
			$resultError = "Что-то пошло не так. Отредактируйте фильм еще раз!";
		}
	}
}

$film = get_film($link, $_GET['id']);



include ('views/head.tpl');
include ('views/notifications.tpl'); 
include ('views/edit-film.tpl');
include ('views/footer.tpl');

?>

