<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

if(isset($_SESSION['auth']['is_admin']) AND $_SESSION['auth']['is_admin'] == 1 ){

	//Пагинация
		//кол-во товаров на страницу
		$perpage = 6;
		//общее кол-во товаров
		$count_goods = count_search();
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

	$pro_article = proArticle($start_pos, $perpage);


	if(!$pro_article){ 
	include VIEW . '404.php';
	exit;
	}

	if(isset($_GET['delete_pro'])){

	$get_com = getCom($_GET['delete_pro']);
		
	if(!empty($get_com)){
		
		$get_photo = getPhoto($_GET['delete_pro']);
			
		
		if(!empty($get_photo)){
			
			delprocompho($_GET['delete_pro']);
		}else{
			
			delprocom($_GET['delete_pro']);
		}
	}else{

		$get_photo = getPhoto($_GET['delete_pro']);
		
		if(!empty($get_photo)){
			
			delpropho($_GET['delete_pro']);
		}else{
			
			delpro($_GET['delete_pro']);
		}
	}
	redirect();
	exit;
	}

	if(isset($_GET['edit_pro'])){

	$edit_pro = editPro($_GET['edit_pro']);
	
	include ADMIN . "{$view}.php";
	exit;
	}

	if(isset($_GET['addition_pro']) AND $_GET['addition_pro'] == 'set'){
	$addition_pro = strip_tags(trim($_GET['addition_pro']));
	include ADMIN . "{$view}.php";
	exit;
	}elseif(isset($_POST['addition'])){
		
	if($_POST['title'] == '' OR $_POST['alias'] == '' OR $_POST['parent'] == '' OR $_POST['discription'] == '' OR $_POST['content'] == '' OR $_POST['img'] == '' OR $_POST['descriptions'] == '' OR $_POST['keywords'] == '' ){
		redirect();
		exit;
	}
	
	 $title = strip_tags(trim($_POST['title']));
	 $alias = strip_tags(trim($_POST['alias']));
	 $parent = (int)$_POST['parent'];
	 $discription = trim($_POST['discription']);
	 $content = trim($_POST['content']);
	 $img = strip_tags(trim($_POST['img']));
	 $price = (int)$_POST['price'];
	 $descriptions = strip_tags(trim($_POST['descriptions']));
	 $keywords = strip_tags(trim($_POST['keywords']));
	
		
	addPro($title, $alias, $parent, $discription, $content, $img, $price, $descriptions, $keywords );
	redirect();
	exit;
	}elseif(isset($_POST['edit'])){
	
	if($_POST['title'] == '' OR $_POST['alias'] == '' OR $_POST['parent'] == '' OR $_POST['discription'] == '' OR $_POST['content'] == '' OR $_POST['img'] == '' OR $_POST['descriptions'] == '' OR $_POST['keywords'] == '' OR $_POST['views'] == '' ){
		redirect();
		exit;
	}

	 $id = (int)$_POST['id'];
	 $title = strip_tags(trim($_POST['title']));
	 $alias = strip_tags(trim($_POST['alias']));
	 $parent = (int)$_POST['parent'];
	 $discription = trim($_POST['discription']);
	 $content = trim($_POST['content']);
	 $img = strip_tags(trim($_POST['img']));
	 $price = (int)$_POST['price'];
	 $descriptions = strip_tags(trim($_POST['descriptions']));
	 $keywords = strip_tags(trim($_POST['keywords']));
	 $views = (int)$_POST['views'];

	//print_arr($_POST);
	updatePro($id, $title, $alias, $parent, $discription, $content, $img, $price, $descriptions, $keywords, $views );
	redirect();
	exit;
}


include ADMIN . "{$view}.php";
}else{
	include VIEW . '404.php';
	exit;
}

?>