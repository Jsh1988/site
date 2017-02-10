<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

if(isset($_SESSION['auth']['is_admin']) AND $_SESSION['auth']['is_admin'] == 1 ){

	if(isset($_GET['id_ip'])){
		deleteids($_GET['id_ip']);
		redirect();
		exit;
	}

	if(isset($_GET['id_vis'])){
		deletevis($_GET['id_vis']);
		redirect();
		exit;
	}

	$getip = getip();
	$getvisits = getvisits();
	//print_arr($getvisits);
	include ADMIN . "{$view}.php";
}else{
	include VIEW . '404.php';
	exit;
}

?>