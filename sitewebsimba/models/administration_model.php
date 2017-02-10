<?php
defined("CATALOG") or die("Acces denied");
//показываем данные из таблицы ips
function getip(){
	global $connection;
	$sql = "SELECT id, ip_adress FROM ips ";
	$res = mysqli_query($connection,$sql);

	$getip = array();
	while($row = mysqli_fetch_assoc($res)){
		$getip[] = $row;
	}
	return $getip;
};
//удаляем даные из таблицы ips по id
function deleteids($id){
	global $connection;
	$sql = "DELETE FROM ips WHERE id = '$id' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//показываем данные из таблицы visits
function getvisits(){
	global $connection;
	$sql = "SELECT id, date, hosts, views FROM visits ";
	$res = mysqli_query($connection,$sql);

	$getvisits = array();
	while($row = mysqli_fetch_assoc($res)){
		$getvisits[] = $row;
	}
	return $getvisits;
};

//удаляем даные из таблицы visits по id
function deletevis($id){
	global $connection;
	$sql = "DELETE FROM visits WHERE id = '$id' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return $res;

};

?>