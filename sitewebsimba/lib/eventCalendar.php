<?php
defined("CATALOG") or die("Acces denied");

function get_events(){
	global $connection;
	$sql = "SELECT id,title,alias,(unix_timestamp(`date`) * 1000 ) as `date` FROM products";
	$res = mysqli_query($connection, $sql);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
};

function get_json($array){
	$data = '[';
	foreach ($array as $item) {
		$data .= '{ "date": "'.$item['date'].'", "title": "'.$item['title'].'", "description": "'.$item['title'].'", "url": "'.PATH.'product/'.$item['alias'].'" },';
	}
	$data .= ']';
	return $data;
};

$events = get_events();
$events = get_json($events);

?>