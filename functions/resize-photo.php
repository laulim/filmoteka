<?php 

if ( isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "") {
		$fileName = $_FILES['photo']['name'];
		$fileTmpLoc = $_FILES['photo']['tmp_name'];
		$fileType = $_FILES['photo']['type'];
		$fileSize = $_FILES['photo']['size'];
		$fileErrorMsg = $_FILES['photo']['error'];
		$kaboom = explode(".", $fileName);
		$fileExt = end($kaboom);

		list($width, $height) = getimagesize($fileTmpLoc);
		if ($width < 10 || $height < 10) {
			$errors[] = 'That image has no dimentions';
		}

		$db_file_name = rand(10000000, 99999999) . "." . $fileExt;
		if ($fileSize > 10485760) {
			$errors[] = 'Your image file was larger than 10Mb';
		} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName)) {
			$errors[] = 'Your image file was not jpg, jpeg, gif or npg type';
		} else if ($fileErrorMsg == 1) {
			$errors[] = 'An unknown error occurred';
		}

		$photoFolderLocation = ROOT . 'data/films/full/';
		$photoFolderLocationMin = ROOT . 'data/films/min/';

		$uploadfile = $photoFolderLocation . $db_file_name;
		$moveResult = move_uploaded_file($fileTmpLoc, $uploadfile);
		if ($moveResult != true) {
			$errors = 'File upload failed';
		}

		require_once(ROOT . "/functions/image_resize_imagick.php");
		$target_file = $photoFolderLocation . $db_file_name;
		$resized_file = $photoFolderLocationMin . $db_file_name;
		$wmax = 137;
		$hmax = 200;
		$img = createThumbnail($target_file, $wmax, $hmax);
		$img->writeImage($resized_file);
	}
 ?>