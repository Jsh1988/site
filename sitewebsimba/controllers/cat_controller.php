<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

if(isset($_SESSION['auth']['is_admin']) AND $_SESSION['auth']['is_admin'] == 1 ){

	$getcat = getcat();

	if(!$getcat){ 
	include VIEW . '404.php';
	exit;
	}

	if(isset($_GET['del_c'])){
	delete($_GET['del_c']);
	redirect();
	exit;
	}

	if(isset($_GET['red_c'])){

	$getupdate = getupdate($_GET['red_c']);
	//print_arr($getupdate);
	include ADMIN . "{$view}.php";
	exit;
}

if(isset($_GET['set_c']) AND $_GET['set_c'] == 'set'){
	$set_c = strip_tags(trim($_GET['set_c']));
	include ADMIN . "{$view}.php";
	exit;
}elseif(isset($_POST['sub'])){
	if($_POST['title'] == '' OR $_POST['alias'] == '' OR $_POST['parent'] == ''){
		redirect();
		exit;
	}
	
	$title = strip_tags(trim($_POST['title']));
	$alias = strip_tags(trim($_POST['alias']));
	$parent = (int)$_POST['parent'];
	setcat($title,$alias,$parent);
	redirect();
	exit;
}elseif(isset($_POST['up_sub'])){
	if($_POST['title'] == '' OR $_POST['alias'] == '' OR $_POST['parent'] == ''){
		redirect();
		exit;
	}
	$id = (int)$_POST['id'];
	$title = strip_tags(trim($_POST['title']));
	$alias = strip_tags(trim($_POST['alias']));
	$parent = (int)$_POST['parent'];

	//print_arr($_POST);
	setupdate($id,$title,$alias,$parent);
	redirect();
	exit;
}

include ADMIN . "{$view}.php";
}else{
	include VIEW . '404.php';
	exit;
}

?>