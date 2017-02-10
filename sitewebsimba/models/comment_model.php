<?php
defined("CATALOG") or die("Acces denied");

//получение комментариев
function add_comment(){
	global $connection;
	
	$comment_firstname = trim(mysqli_real_escape_string($connection, $_POST['commentFirstname']));
	$comment_surname = trim(mysqli_real_escape_string($connection, $_POST['commentSurname']));
	$comment_text = trim(mysqli_real_escape_string($connection, $_POST['commentText']));
	$parent = (int)$_POST['parent'];
	$comment_product = (int)$_POST['productId'];
	
	//если нет id товара
	if(!$comment_product){
		$res = array('answer' => 'Неизвестный продукт');
		return json_encode($res);
	}
	//если не заполнены поля
	if(empty($comment_firstname) OR empty($comment_surname)  OR empty($comment_text)){
		$res = array('answer' => 'Заполните поля!');
		return json_encode($res);
	}

	if(isset($_SESSION['auth']['firstname'])){
		$firstname = $_SESSION['auth']['firstname'];
		$sql = "SELECT is_admin FROM users WHERE firstname = '$firstname' ";
		$res = mysqli_query($connection,$sql);
		$row = mysqli_fetch_row($res);
		
		$sql = "INSERT INTO comments (firstname, surname, content, parent, id_product, is_admin)
					VALUES('$comment_firstname','$comment_surname','$comment_text', $parent, $comment_product, $row[0])";
		mysqli_query($connection,$sql);

	}else{
		$sql = "INSERT INTO comments (firstname, surname, content, parent, id_product)
					VALUES('$comment_firstname','$comment_surname','$comment_text', $parent, $comment_product)";
		mysqli_query($connection,$sql);
	}
	

	//если что то изменилось в БД
	//даная функция вернёт колечество изменёных рядов mysqli_affected_rows
	if(mysqli_affected_rows($connection) > 0){
		$comment_id = mysqli_insert_id($connection);//определяем id комментария
		$comment_html = get_last_comment($comment_id);
		return $comment_html;
	}else{
		$res = array('answer' => 'Ошибка добавления комментария');
		return json_encode($res);
	}
};

//получение добавленого коментария
function get_last_comment($id_product){
	global $connection;
	$sql = "SELECT id, firstname, surname, content, parent, id_product, approved, date, is_admin FROM comments WHERE id = $id_product ";
	$res = mysqli_query($connection,$sql);
	$comment =  mysqli_fetch_assoc($res);
	ob_start();
	include VIEW . 'new_comment.php';
	$comment_html = ob_get_clean();
	$res = array('answer' => 'Комментарий добавлен!', 'code' => $comment_html, 'id' => $id_product);
	return json_encode($res);
};

?>