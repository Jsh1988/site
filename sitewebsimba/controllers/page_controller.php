<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

$page = get_one_page($page_alias);

if(!$page){
	include VIEW . '404.php';
	exit;
}
//print_arr($page);
$breadcrumbs = "<li><a href='".PATH."'>Главная</a></li> - <li>{$page['title']}</li>";
include VIEW . "{$view}.php";
?>