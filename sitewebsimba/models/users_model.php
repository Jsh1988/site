<?php
defined("CATALOG") or die("Acces denied");

//Достаём данные с таблицы
function getUs($start_pos, $perpage){
	global $connection;
	$sql = "SELECT id, login, email, firstname, surname, phone, country, region, city, indexs, street, house, is_admin FROM users LIMIT $start_pos, $perpage ";
	$res = mysqli_query($connection,$sql);

	$getuser = array();
	while($row = mysqli_fetch_assoc($res)){
		$getuser[] = $row;
	}
	return $getuser;
};
//удаляем даные из таблицы acategories по id
function delUs($id){
	global $connection;
	$sql = "DELETE FROM users WHERE id = '$id' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//Редактировать данные таблицы
function editUs($id){
	global $connection;
	$sql = "SELECT id, is_admin FROM users WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);

	if(mysqli_num_rows($res) == true){
		$row = mysqli_fetch_assoc($res);
		return $row;
	}

};
function updateUs(){

	$id = (int)$_POST['id'];
	$admin = strip_tags(trim($_POST['admin']));


	if($_POST['admin'] == '' ){
		return;
	}

	global $connection;
	$sql = "UPDATE users SET is_admin = $admin WHERE id = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//кол-во 
function count_search(){
	global $connection;
	
	$sql = "SELECT COUNT(*) FROM users ";
	$res = mysqli_query($connection, $sql);

	$count_search = mysqli_fetch_row($res);
	return $count_search[0];
};

?>