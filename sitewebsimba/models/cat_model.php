<?php
defined("CATALOG") or die("Acces denied");

//Достаём данные с таблицы categories
function getcat(){
	global $connection;
	$sql = "SELECT id, title, alias, parent FROM categories ";
	$res = mysqli_query($connection,$sql);

	$getcat = array();
	while($row = mysqli_fetch_assoc($res)){
		$getcat[] = $row;
	}
	return $getcat;
};
//удаляем даные из таблицы categories по id
function delete($id){
	global $connection;
	$sql = "DELETE FROM categories WHERE id = '$id' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//добавляем данные в таблицу acategories
function setcat($titl,$alia,$paren){
	$title = strip_tags(trim($titl));
	$alias = strip_tags(trim($alia));
	$parent = (int)$paren;

	global $connection;
	$sql = "INSERT INTO categories(title, alias, parent) VALUES('$title', '$alias', $parent) ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Редактировать данные таблицы acategories
function getupdate($id){
	global $connection;
	$sql = "SELECT id, title, alias, parent FROM categories WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);

	if(mysqli_num_rows($res) == true){
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
};
function setupdate($id,$title,$alias,$parent){
	global $connection;
	$sql = "UPDATE categories SET title = '$title', alias = '$alias', parent = $parent  WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);
	return $res;

};

?>