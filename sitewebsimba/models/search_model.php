<?php
defined("CATALOG") or die("Acces denied");

//поиск autocomplete
function search_auto(){

	global $connection;
	$search = trim(mysqli_real_escape_string($connection, $_GET['term']));
	$sql = "SELECT title FROM products WHERE title LIKE '%{$search}%' LIMIT 10";//%{$search}% - не использует индекс {$search}% - использует индекс
	$res = mysqli_query($connection, $sql);
	$result_search = array();
	while($row = mysqli_fetch_assoc($res)){
		$result_search[] = $row['title'];
	}
	return $result_search;
};

//кол-во результатов поиска
function count_search(){
	global $connection;
	$search = trim(mysqli_real_escape_string($connection, $_GET['search']));
	$sql = "SELECT COUNT(*) FROM products WHERE title LIKE '%{$search}%'";
	$res = mysqli_query($connection, $sql);

	$count_search = mysqli_fetch_row($res);
	return $count_search[0];
};

//поиск
function search($start_pos, $perpage){
	global $connection;
	$search = trim(mysqli_real_escape_string($connection, $_GET['search']));
	$sql = "SELECT id,title,alias,parent,discription,content,img,price,descriptions,keywords,date,views FROM products WHERE title LIKE '%{$search}%' LIMIT $start_pos, $perpage";
	$res = mysqli_query($connection, $sql);

	if( !mysqli_num_rows($res) ){
		return 'Ничего не найдено';
	}

	$result_search = array();
	while($row = mysqli_fetch_assoc($res)){
		$result_search[] = $row;
	}

	$_SESSION['search']['ok'] = 'Найдено в поиске';
	
	return $result_search;
};

?>