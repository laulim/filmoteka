

<h1 class="title-1"> Информация о фильме <?=$film['title'] ?></h1>

	<div class="card mb-20">
		<!-- row -->
		<div class="row">
			<!-- col 1 -->
			<div class="col-6">
				<img width="100%" src="<?=HOST.'data/films/full/'.$film['photo'] ?>" alt="<?=$film['title'] ?>">
			</div>
			<!--  // col 1 -->
			<!-- col 2 -->
			<div class="col-6">
				<div class="card__header">
					<h4 class="title-4"><?=$film['title'] ?></h4>
					<?php if (isAdmin()) { ?>
						<div>
							<a href="edit.php?id=<?=$film['id'] ?>" class="button button--edit">Редактировать</a>
							<a href="?action=delete&id=<?=$film['id'] ?>" class="button button--delete">Удалить</a>	
						</div>
					<?php } ?>	
				</div>
				<div class="badge"><?=$film['genre'] ?></div>
				<div class="badge"><?=$film['year'] ?></div>
				<div class="user-content">
					<p><?=$film['description'] ?></p>
				</div>
			</div>
			<!-- // col 2 -->
		</div>
		<!-- // row -->
		
	</div>
