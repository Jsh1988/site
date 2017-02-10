<?php
defined("CATALOG") or die("Acces denied");

//Достаём данные с таблицы pages
function getmenu(){
	global $connection;
	$sql = "SELECT page_id, title, alias, description, keywords, content, img, position FROM pages ";
	$res = mysqli_query($connection,$sql);

	$getmenu = array();
	while($row = mysqli_fetch_assoc($res)){
		$getmenu[] = $row;
	}
	return $getmenu;
};
//удаляем даные из таблицы pages по id
function delete($id){
	global $connection;
	$sql = "DELETE FROM pages WHERE page_id = '$id' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//добавляем данные в таблицу pages
function setmenu($titl,$alia,$descriptio,$keyword,$conten,$imgs,$positio){
	$title = strip_tags(trim($titl));
	$alias = strip_tags(trim($alia));
	$description = strip_tags(trim($descriptio));
	$keywords = strip_tags(trim($keyword));
	$content = trim($conten);
	$img = strip_tags(trim($imgs));	
	$position = (int)$positio;

	global $connection;
	$sql = "INSERT INTO pages(title, alias, description, keywords, content, img, position)
				 VALUES('$title','$alias','$description','$keywords','$content','$img',$position) ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Достаём данные таблицы pages
function getupdate($id){
	global $connection;
	$sql = "SELECT page_id, title, alias, description, keywords, content, img, position FROM pages WHERE page_id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);

	if(mysqli_num_rows($res) == true){
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
};
//Редактируем данные
function setupdate($id, $title, $alias, $description, $keywords, $content, $img, $position){
	global $connection;
	$sql = "UPDATE pages SET title = '$title', alias = '$alias', description = '$description', keywords = '$keywords', content = '$content', img = '$img', position = $position  WHERE page_id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);
	return $res;

};

?>