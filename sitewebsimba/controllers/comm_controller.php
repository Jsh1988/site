<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

if(isset($_SESSION['auth']['is_admin']) AND $_SESSION['auth']['is_admin'] == 1 ){

	//Пагинация
		//кол-во товаров на страницу
		$perpage = 3;
		//общее кол-во товаров
		$count_goods = counts();
		//необходимое кол-во страниц 
		$count_pages = ceil($count_goods / $perpage);//приводим к целому числу и округляем в большую сторону
		//мин 1 страница
		if(!$count_pages) $count_pages = 1;
		//номер запрошеной страницы
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1) $page = 1;
		}else{
			$page = 1;
		}
	//если запрошеная страница больше максимума
	if($page > $count_pages) $page = $count_pages;
	
	//начальная позиция для запроса
	$start_pos = ($page - 1) * $perpage;
	//функция постраничной навигации
	$pagenation = pagenation($page, $count_pages);
		
	//Пагинация

	$getCom = getCom($start_pos, $perpage);


	if(!$getCom){ 
	include VIEW . '404.php';
	exit;
	}

	if(isset($_GET['delete_com'])){

	delCom($_GET['delete_com']);

	redirect();
	exit;
	}

	if(isset($_GET['edit_com'])){

	$edit_com = editCom($_GET['edit_com']);
	
	include ADMIN . "{$view}.php";
	exit;
	}

	if(isset($_POST['edit'])){

	updateCom();
	redirect();
	exit;

	}

include ADMIN . "{$view}.php";
}else{
	include VIEW . '404.php';
	exit;
}

?>