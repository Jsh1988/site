<?php
defined("CATALOG") or die("Acces denied");

//Достаём данные с таблицы
function gallery(){
	global $connection;
	$sql = "SELECT id_photo, title, photo, parent, photo_description, link, mark FROM photos ";
	$res = mysqli_query($connection,$sql);

	$gallery = array();
	while($row = mysqli_fetch_assoc($res)){
		$gallery[] = $row;
	}
	return $gallery;
};
//удаляем даные из таблицы acategories по id
function delGal($id){
	global $connection;
	$sql = "DELETE FROM photos WHERE id_photo = '$id' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//добавляем данные в таблицу 
function addGal(){
	echo $title = strip_tags(trim($_POST['title']));
	echo $photo = strip_tags(trim($_POST['photo']));
	echo $parent = (int)$_POST['parent'];
	echo $photo_description = strip_tags(trim($_POST['photo_description']));
	echo $link = strip_tags(trim($_POST['link']));
	echo $mark =(int)$_POST['mark'];

	if($_POST['title'] == '' OR $_POST['photo'] == '' OR $_POST['parent'] == '' OR $_POST['photo_description'] == '' OR $_POST['mark'] == '' ){
		return ;
	}



	global $connection;
	$sql = "INSERT INTO photos(title, photo, parent, photo_description, link, mark ) VALUES('$title', '$photo', $parent, '$photo_description', '$link', $mark ) ";
	$res = mysqli_query($connection,$sql);
	return $res;
};
//Редактировать данные таблицы
function editGal($id){
	global $connection;
	$sql = "SELECT id_photo, title, photo, parent, photo_description, link, mark FROM photos WHERE id_photo = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);

	if(mysqli_num_rows($res) == true){
		$row = mysqli_fetch_assoc($res);
		return $row;
	}

};
function updateGal($id, $title, $photo, $parent, $photo_description, $link, $mark){

	global $connection;

	$sql = "UPDATE photos SET title = '$title', photo = '$photo', parent = $parent, photo_description = '$photo_description', link = '$link',  mark = $mark  WHERE id_photo = '$id' LIMIT 1 ";
	$res = mysqli_query($connection,$sql);
	return $res;

};
//Загрузка картинки
function load_foto(){
	if(isset($_FILES['foto']) AND ($_FILES['foto']['error'] == 0) ){
		//путь к временой папке
		$tmp = $_FILES['foto']['tmp_name'];
		//куда помещаем картинку
		$name = "./".VIEW."img/". $_POST['folder'] . $_FILES['foto']['name'];

		if ($_FILES['foto']["size"] == 0 OR $_FILES['foto']["size"] > 2050000){
			return 'no';
		}

		if (($_FILES['foto']["type"] != "image/jpeg") AND ($_FILES['foto']["type"] != "image/png")){
			return 'no';
		}

		$res = move_uploaded_file($tmp, $name);
		if($res){
			return 'yes';
		}else{
			return 'no';
		}
	}
};
function getDir(){
	$path = "./".VIEW."img/". $_POST['folder'];
	$img = scandir($path);
	$array = array('path' => $path, 'img' => $img );
	return $array;
};
function delFile(){

	if($_POST['name'] == ''){
		return 'no';
	}

	$path = strip_tags(trim($_POST['path']));
	$name = strip_tags(trim($_POST['name']));

	if(file_exists($path . $name)){
		if(unlink($path . $name)){
			return "yes";
		}else{
			return "no";
		}
		
	}else{
		return "no";
	}
};

?>