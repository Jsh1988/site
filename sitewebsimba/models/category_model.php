<?php
defined("CATALOG") or die("Acces denied");

//получение id по alias
function get_id($categories, $category_alias){
	if(!$category_alias) return false;
	foreach ($categories as $key => $value) {
		if($value['alias'] == $category_alias) return $key;
	}
	return false;
};//получение id по alias

//7Получение id дочерних категорий
function cats_id($array,$id){
	if(!$id) return false;
	$data = null;
	foreach($array as $item){
		if($item['parent'] == $id){
			$data.= $item['id'].",";
			$data.= cats_id($array,$item['id']);
		}
	}
	return $data;
};

//8получение товаров $start_pos- с какого ряда выборка,$perpage - сколько рядов необходимо взять
function get_product($ids,$start_pos,$perpage){
	global $connection;
	if($ids){
	$sql = "SELECT id,title,alias,parent,discription,content,img,price,descriptions,keywords,date,views FROM products WHERE parent IN($ids) ORDER BY id DESC LIMIT $start_pos,$perpage ";//IN()- 'это множество' // диапозон значений 
	}else{
		$sql = "SELECT id,title,alias,parent,discription,content,img,price,descriptions,keywords,date,views FROM products ORDER BY id DESC LIMIT $start_pos,$perpage ";
	}
	$res = mysqli_query($connection,$sql);
	$products = array();
	while($row = mysqli_fetch_assoc($res)){
		$products[] = $row;
	}
	return $products;
};//8получение товаров 

//9получаем общее количество товаров
//в ids - или 0 или 1,2,3 или одно число
function count_goods($ids){
	global $connection;
	if(!$ids){
		$sql = "SELECT COUNT(*) FROM products";
	}else{
		$sql = "SELECT COUNT(*) FROM products WHERE parent IN($ids)";
	}
	$res = mysqli_query($connection,$sql);
	$count_goods = mysqli_fetch_row($res);
	return $count_goods[0];
};

?>