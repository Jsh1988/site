<?php
defined("CATALOG") or die("Acces denied");

//Достаём данные с таблицы products
function proArticle($start_pos, $perpage){
	global $connection;
	$sql = "SELECT id, title, alias, parent, discription, content, img, price, descriptions, keywords, date, hosts, views FROM products LIMIT $start_pos, $perpage ";
	$res = mysqli_query($connection,$sql);

	$pro_article = array();
	while($row = mysqli_fetch_assoc($res)){
		$pro_article[] = $row;
	}
	return $pro_article;
};
//Добавляем продукт в БД
function addPro($title, $alias, $parent, $discription, $content, $img, $price, $descriptions, $keywords ){

	$title = strip_tags(trim($title));
	$alias = strip_tags(trim($alias));
	$parent = (int)$parent;
	$discription = trim($discription);
	$content = trim($content);
	$img = strip_tags(trim($img));
	$price = (int)$price;
	$descriptions = strip_tags(trim($descriptions));
	$keywords = strip_tags(trim($keywords));
	$date = date("Y-m-d");
	$hosts = 0;
	$views = 0;

	global $connection;
	$sql = "INSERT INTO products(title, alias, parent, discription, content, img, price, descriptions, keywords, date, hosts, views )
				 VALUES('$title', '$alias', $parent, '$discription', '$content', '$img', $price, '$descriptions', '$keywords', '$date', $hosts, $views ) ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Достаём данные таблицы 
function editPro($id){
	global $connection;
	$sql = "SELECT id, title, alias, parent, discription, content, img, price, descriptions, keywords, views  FROM products WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);

	if(mysqli_num_rows($res) == true){
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
};
//Редактируем данные
function updatePro($id, $title, $alias, $parent, $discription, $content, $img, $price, $descriptions, $keywords, $views ){
	global $connection;
	$sql = "UPDATE products SET title = '$title', alias = '$alias', parent = $parent, discription = '$discription', content = '$content', img = '$img', price = $price, descriptions = '$descriptions', keywords = '$keywords', views = $views  WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Показывает комментарии
function getCom($id){
	global $connection;
	$sql = "SELECT id, firstname, surname, content, parent, id_product, approved, date, is_admin FROM comments WHERE id_product = '$id' ";
	$res = mysqli_query($connection,$sql);

	$get_com = array();
	while($row = mysqli_fetch_assoc($res)){
		$get_com[] = $row;
	}
	return $get_com;

};
//Показывает картинки галереи
function getPhoto($id){
	global $connection;
	$sql = "SELECT id_photo, title, photo, parent, photo_description, link, mark FROM photos WHERE parent = '$id' ";
	$res = mysqli_query($connection,$sql);

	$get_photo = array();
	while($row = mysqli_fetch_assoc($res)){
		$get_photo[] = $row;
	}
	return $get_photo;
};
//Удаление продукт комментарии картинки
function delprocompho($id){
	global $connection;
	$sql = "DELETE pro.*, com.*, pho.* FROM products pro, comments com, photos pho WHERE pro.id = '$id' AND com.id_product = pro.id AND pho.parent = pro.id ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Удаление продукт комментарии
function delprocom($id){
	global $connection;
	$sql = "DELETE pro.*, com.* FROM products pro, comments com WHERE pro.id = '$id' AND com.id_product = pro.id  ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Удаление продукт картинки
function delpropho($id){
	global $connection;
	$sql = "DELETE pro.*, pho.* FROM products pro, photos pho WHERE pro.id = '$id' AND pho.parent = pro.id ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Удаление продукт 
function delpro($id){
	global $connection;
	$sql = "DELETE pro.* FROM products pro WHERE pro.id = '$id' ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//кол-во результатов поиска
function count_search(){
	global $connection;
	
	$sql = "SELECT COUNT(*) FROM products ";
	$res = mysqli_query($connection, $sql);

	$count_search = mysqli_fetch_row($res);
	return $count_search[0];
};

?>