<?php defined("CATALOG") or die("Acces denied"); 

function out(){

//удаляем куки
if( isset( $_COOKIE['ex'] ) ){

	global $connection;
	/*mysqli_real_escape_string - Игнорирует специальные символы в строках для использования в выражениях SQL,
	 принимая во внимание текущую кодировку соединения*/
	$hash = mysqli_real_escape_string($connection, $_COOKIE['ex']);
	$sql = "UPDATE users SET remember = '' WHERE remember = '$hash' ";
	mysqli_query($connection,$sql);
	setcookie('ex', '', time()-60*60*24*7);
		
}//удаляем куки

};

?>