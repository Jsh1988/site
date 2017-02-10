<?php
defined("CATALOG") or die("Acces denied");

//Достаём данные с таблицы acategories
function getacat(){
	global $connection;
	$sql = "SELECT id, title, alias, parent FROM acategories ";
	$res = mysqli_query($connection,$sql);

	$getacat = array();
	while($row = mysqli_fetch_assoc($res)){
		$getacat[] = $row;
	}
	return $getacat;
};
//удаляем даные из таблицы acategories по id
function delete($id){
	global $connection;
	$sql = "DELETE FROM acategories WHERE id = '$id' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//добавляем данные в таблицу acategories
function setacat($titl,$alia,$paren){
	$title = strip_tags(trim($titl));
	$alias = strip_tags(trim($alia));
	$parent = (int)$paren;

	global $connection;
	$sql = "INSERT INTO acategories(title, alias, parent) VALUES('$title', '$alias', $parent) ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Редактировать данные таблицы acategories
function getupdate($id){
	global $connection;
	$sql = "SELECT id, title, alias, parent FROM acategories WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);

	if(mysqli_num_rows($res) == true){
		$row = mysqli_fetch_assoc($res);
		return $row;
	}

};
function setupdate($id,$title,$alias,$parent){
	global $connection;
	$sql = "UPDATE acategories SET title = '$title', alias = '$alias', parent = $parent  WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);
	return $res;

};

?>