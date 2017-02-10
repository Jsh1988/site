<?php
defined("CATALOG") or die("Acces denied");

//11 получение отдельного товара
function get_one_product($product_alias){
	global $connection;
	$product_alias = mysqli_real_escape_string($connection,$product_alias);
	$sql = "SELECT id,title,alias,parent,discription,content,img,price,descriptions,keywords,date,views FROM products WHERE alias = '$product_alias' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return mysqli_fetch_assoc($res);
};

//Получение комментария
function get_comments($id_product){
	global $connection;
	$sql = "SELECT id, firstname, surname, content, parent, id_product, approved, date, is_admin FROM comments WHERE id_product = $id_product ORDER BY id";
	$res = mysqli_query($connection,$sql);
	$comments = array();
	while($row = mysqli_fetch_assoc($res)){
		$comments[$row['id']] = $row;
	}
	return $comments;
};

//получение кол-ва комментариев
function count_comments($id_product){
	global $connection;
	$sql = "SELECT COUNT(*) FROM comments WHERE id_product = $id_product";
	$res = mysqli_query($connection,$sql);
	$row = mysqli_fetch_row($res);
	return $row[0];
};
//получаем картинки
function gallery($id){
	global $connection;
	$sql = "SELECT id_photo, title, photo, parent, photo_description, link, mark FROM photos WHERE parent = $id";
	$res = mysqli_query($connection,$sql);
	$gallery = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$gallery[$row['id_photo']] = $row;
	}
	return $gallery;
};

?>