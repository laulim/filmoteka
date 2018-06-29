<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8"/>
		<title>UI-kit и HTML фреймворк - Документация</title>
		<!--[if IE]>
			<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<![endif]-->
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<meta name="keywords" content=""/>
		<meta name="description" content=""/><!-- build:cssVendor css/vendor.css -->
		<link rel="stylesheet" href="libs/normalize-css/normalize.css"/>
		<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css"/>
		<link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css"/><!-- endbuild -->
<!-- build:cssCustom css/main.css -->
		<link rel="stylesheet" href="./css/main.css"/><!-- endbuild -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
<!--[if lt IE 9]>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
	</head>
	<body>
		<div class="container user-content pt-35">
			<div class="admin-nav mb-50">
				<a class="admin-nav__link" href="index.php">Все фильмы</a>
				<a class="admin-nav__link" href="new.php">Добавить новый фильм</a>
				<a class="admin-nav__link" href="request.php">Укажите ваши данные</a>
			</div>

			<?php if (isset($_COOKIE['user-name']) ) {?>
				<div class="mb-50">
					<?php if (isset($_COOKIE['user-city'])) {?>
						Привет, <?=$_COOKIE['user-name']?> из города <?=$_COOKIE['user-city']?>!
					<?php } else {?>
							Привет, <?=$_COOKIE['user-name']?>!
						<?php } ?>
				</div>
			<?php } ?>

			