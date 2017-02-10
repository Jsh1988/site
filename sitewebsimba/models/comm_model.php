<?php
defined("CATALOG") or die("Acces denied");

//Достаём данные с таблицы
function getCom($start_pos, $perpage){
	global $connection;
	$sql = "SELECT com.id as comid, com.firstname, com.surname, com.content, com.id_product, com.approved, com.date, pro.id, pro.title FROM comments com, products pro WHERE com.id_product = pro.id ORDER BY com.id_product DESC LIMIT $start_pos, $perpage ";
	$res = mysqli_query($connection,$sql);

	$getCom = array();
	while($row = mysqli_fetch_assoc($res)){
		$getCom[] = $row;
	}
	return $getCom;
};
//удаляем даные из таблицы acategories по id
function delCom($id){
	global $connection;
	$sql = "DELETE FROM comments WHERE id = '$id' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//Редактировать данные таблицы
function editCom($id){
	global $connection;
	$sql = "SELECT id, approved FROM comments WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);

	if(mysqli_num_rows($res) == true){
		$row = mysqli_fetch_assoc($res);
		return $row;
	}

};
function updateCom(){

	$id = (int)$_POST['id'];
	$approved = strip_tags(trim($_POST['approved']));
	

	if( $_POST['approved'] == '' ){
		return;
	}

	global $connection;

	$sql = "UPDATE comments SET approved = '$approved' WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//кол-во 
function counts(){
	global $connection;
	$sql = "SELECT COUNT(*) FROM comments ";
	$res = mysqli_query($connection, $sql);

	$counts = mysqli_fetch_row($res);
	return $counts[0];
};


?>