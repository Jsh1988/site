<?php
defined("CATALOG") or die("Acces denied");
//11 получение страницы
function get_one_page($page_alias){
	global $connection;
	$page_alias = mysqli_real_escape_string($connection,$page_alias);
	$sql = "SELECT page_id,title,alias,description,keywords,content,img,position FROM pages WHERE alias = '$page_alias' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return mysqli_fetch_assoc($res);
};
?>