<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

if( !isset($category_alias) ) $category_alias = null;
$id = get_id($categories, $category_alias);

include 'lib/breadcrumbs.php';

// если неправельная категория 
if($category_alias && !$id){
	$products = $count_pages = null;
	include VIEW . "{$view}.php";
	exit;
}//

//Получаем Id дочерних категорий
$ids = cats_id($categories,$id);
$ids = !$ids ? $id : $ids . $id;

//Пагинация
		//1 кол-во товаров на страницу
		/*$perpage =( isset($_COOKIE['per_page']) ) && (int)$_COOKIE['per_page'] ? $_COOKIE['per_page'] : PERPAGE;*/
		$perpage = PERPAGE;
		//2 общее кол-во товаров
		$count_goods = count_goods($ids);
		//3 необходимое кол-во страниц 
		$count_pages = ceil($count_goods / $perpage);//приводим к целому числу и округляем в большую сторону
		//4 мин 1 страница
		if(!$count_pages) $count_pages = 1;
		//5 номер запрошеной страницы
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1) $page = 1;
		}else{
			$page = 1;
		}
		//echo $page;
	//6 если запрошеная страница больше максимума
	if($page > $count_pages) $page = $count_pages;
	
	//7 начальная позиция для запроса
	$start_pos = ($page - 1) * $perpage;
	//8 функция постраничной навигации
	$pagenation = pagenation($page, $count_pages);
		
//Пагинация


//2параметр скакого ряда 3параметр сколько рядов
$products = get_product($ids,$start_pos,$perpage);



include VIEW . "{$view}.php";

?>