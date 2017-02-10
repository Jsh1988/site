<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

if(isset($_SESSION['auth']['is_admin']) AND $_SESSION['auth']['is_admin'] == 1 ){

	$gallery = gallery();


	if(!$gallery){ 
	include VIEW . '404.php';
	exit;
	}

	if(isset($_GET['delete_gal'])){

	delGal($_GET['delete_gal']);

	redirect();
	exit;
	}

	if(isset($_GET['edit_gal'])){

	$edit_gal = editGal($_GET['edit_gal']);
	
	include ADMIN . "{$view}.php";
	exit;
	}

	if(isset($_GET['addition_gal']) AND $_GET['addition_gal'] == 'set'){

		$addition_gal = strip_tags(trim($_GET['addition_gal']));
		include ADMIN . "{$view}.php";
		exit;

	}elseif(isset($_POST['addition'])){
				
		addGal();
		redirect();
		exit;

	}elseif(isset($_POST['edit'])){

	$id = (int)$_POST['id'];
	$title = strip_tags(trim($_POST['title']));
	$photo = strip_tags(trim($_POST['photo']));
	$parent = (int)$_POST['parent'];
	$photo_description = strip_tags(trim($_POST['photo_description']));
	$link = strip_tags(trim($_POST['link']));
	$mark =(int)$_POST['mark'];

	if($_POST['title'] == '' OR $_POST['photo'] == '' OR $_POST['parent'] == '' OR $_POST['photo_description'] == '' OR $_POST['mark'] == '' ){
		redirect();
		exit;
	}
	
	updateGal($id, $title, $photo, $parent, $photo_description, $link, $mark );
	redirect();
	exit;

	}elseif(isset($_GET['addition_foto']) AND $_GET['addition_foto'] == 'foto'){
		$addition_foto = strip_tags(trim($_GET['addition_foto']));
		
		include ADMIN . "{$view}.php";
		exit;
	}elseif(isset($_POST['Upload_picture'])){

		$load_foto = load_foto();
		if($load_foto == 'yes'){
			redirect();
			exit;
		}else{
			include VIEW . '404.php';
			exit;
		}
		
	}elseif(isset($_POST['di_fil'])){
		
		$get_dir = getDir();
		
		include ADMIN . "{$view}.php";
		exit;
	}elseif(isset($_POST['del_f'])){
		//print_arr($_POST);
		$del = delFile();
		if($del == 'yes'){

			redirect();
			exit;

		}else{
			include VIEW . '404.php';
			exit;
		}
		
	}


include ADMIN . "{$view}.php";
}else{
	include VIEW . '404.php';
	exit;
}

?>