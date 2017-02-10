<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

//1 получаем информацию о продукте массив
	$get_one_product = get_one_product($product_alias);

//2 если нет товара в наличие
	if(!$get_one_product){
		include VIEW . "404.php";
		exit;
	}

//3 получаем id категории
	$id = $get_one_product['parent'];
//4 id товара
	$id_product = $get_one_product['id'];
	
//5 получаем количество комментариев
	$count_comments = count_comments($id_product);//product


//6 получаем комментарии к товару
	$get_comments = get_comments($id_product);//product

//7 Строим дерево
	$comments_tree = map_tree($get_comments);//mail

//8 Получаем html-код комментариев
	$comments = categories_to_string($comments_tree, $template = 'comments_template.php');//mail

//9 считаем сколько прочитало людей статью
$website = website($product_alias);

$gallery = gallery($get_one_product['id']);

include 'lib/breadcrumbs.php';
include VIEW . "{$view}.php";

?>