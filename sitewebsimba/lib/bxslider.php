<?php 
defined("CATALOG") or die("Acces denied");
function get_bxslider(){
	global $connection;
	$sql = "SELECT id,title,images,url FROM bxslider";
	$res = mysqli_query($connection, $sql);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
};

$bxslider = get_bxslider();
//print_arr($bxslider);

?>