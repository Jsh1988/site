<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";
//include 'lib/upload.php';

if(isset($_SESSION['auth']['is_admin']) AND $_SESSION['auth']['is_admin'] == 1 ){

	$getmenu = getmenu();

	if(!$getmenu){ 
	include VIEW . '404.php';
	exit;
	}
	

	if(isset($_GET['del_menu'])){
	delete($_GET['del_menu']);
	redirect();
	exit;
	}

	if(isset($_GET['red_menu'])){

	$getupdate = getupdate($_GET['red_menu']);
	//print_arr($getupdate);
	include ADMIN . "{$view}.php";
	exit;
	}

	if(isset($_GET['set_menu']) AND $_GET['set_menu'] == 'set'){
	$set_menu = strip_tags(trim($_GET['set_menu']));
	include ADMIN . "{$view}.php";
	exit;
	}elseif(isset($_POST['sub'])){
		
	if($_POST['title'] == '' OR $_POST['alias'] == '' OR $_POST['description'] == '' OR $_POST['keywords'] == '' OR $_POST['img'] == '' OR $_POST['position'] == ''){
		redirect();
		exit;
	}
	
	$title = strip_tags(trim($_POST['title']));
	$alias = strip_tags(trim($_POST['alias']));
	$description = strip_tags(trim($_POST['description']));
	$keywords = strip_tags(trim($_POST['keywords']));
	$content = trim($_POST['content']);
	$img = strip_tags(trim($_POST['img']));	
	$position = (int)$_POST['position'];

	setmenu($title, $alias, $description, $keywords, $content, $img, $position);
	redirect();
	exit;
	}elseif(isset($_POST['up_sub'])){
	
	if($_POST['title'] == '' OR $_POST['alias'] == '' OR $_POST['description'] == '' OR $_POST['keywords'] == '' OR $_POST['img'] == '' OR $_POST['position'] == ''){
		redirect();
		exit;
	}

	$id = (int)$_POST['id'];
	$title = strip_tags(trim($_POST['title']));
	$alias = strip_tags(trim($_POST['alias']));
	$description = strip_tags(trim($_POST['description']));
	$keywords = strip_tags(trim($_POST['keywords']));
	$content = trim($_POST['content']);
	$img = strip_tags(trim($_POST['img']));	
	$position = (int)$_POST['position'];;

	//print_arr($_POST);
	setupdate($id, $title, $alias, $description, $keywords, $content, $img, $position);
	redirect();
	exit;
}

	include ADMIN . "{$view}.php";
}else{
	include VIEW . '404.php';
	exit;
}

?>