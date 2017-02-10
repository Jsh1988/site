<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

if(isset($_SESSION['auth']['is_admin']) AND $_SESSION['auth']['is_admin'] == 1 ){

$getacat = getacat();

if(!$getacat){ 
	include VIEW . '404.php';
	exit;
}

if(isset($_GET['del_ac'])){
	delete($_GET['del_ac']);
	redirect();
	exit;
}

if(isset($_GET['red_ac'])){

	$getupdate = getupdate($_GET['red_ac']);
	//print_arr($getupdate);
	include ADMIN . "{$view}.php";
	exit;
}

if(isset($_GET['set_ac']) AND $_GET['set_ac'] == 'set'){
	$set_ac = strip_tags(trim($_GET['set_ac']));
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
	setacat($title,$alias,$parent);
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