<?php
defined("CATALOG") or die("Acces denied");

//1 функция для удобной распечатки массива
function print_arr($array){
	echo "<pre>".print_r($array,true)."</pre>";
};

//redirect
function redirect($http = false){
	if($http) $redirect = $http;
	else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
};

//Получение страниц
function get_pages(){
global $connection;
	$sql = "SELECT title,alias FROM pages ORDER BY position";
	$res = mysqli_query($connection,$sql);//выполняем запрос
	
	$pages = array();
	//заполняем массив получеными данными
	while($row = mysqli_fetch_assoc($res)){
	$pages[$row['alias']] = $row['title'];
	}
	return $pages;
};

//2 функция получает данные(array) из таблицы категорий
function get_categories(){
	global $connection;
	$sql = "SELECT id, title, alias, parent FROM categories";
	//выполняем запрос
	$res = mysqli_query($connection,$sql);

	$array_categories = array();
	//заполняем массив получеными данными
	while($row = mysqli_fetch_assoc($res)){
		$array_categories[$row['id']] = $row;
	}
	//mysqli_cloce($connection);
	return $array_categories;
};

//3 функция строит с массива дерево каталога
function map_tree($dataset){
	$tree = array();
	
	foreach($dataset as $id=>&$node){
		if(!$node['parent']){
			$tree[$id] = &$node;
		}else{
			$dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}
	return $tree;
};

//4 Превращает дерево в строку html кода
function categories_to_string($data, $template = 'category_template.php'){
	$string = null;
	//print_arr($data);
	foreach($data as $item){
		//if( !isset($item['childs']) && !$item['count_products'] ) continue;
		$string .= categories_to_template($item, $template);
	}
	return $string;
};
//5 шаблон вывода
function categories_to_template($category, $template){
	ob_start();//буферизация вывода
	include "views/{$template}";
	return ob_get_clean();//очищаем буфер вывода
};

//6 хлебные крошки
function breadcrumbs($array,$id){
	if(!$id) return false;
	
	$count = count($array);
	$breadcrumbs_array = array();
	
	for($i=0;$i<$count;$i++){
		if(isset($array[$id])){
			$breadcrumbs_array[$array[$id]['alias']] = $array[$id]['title'];
			$id = $array[$id]['parent'];
		}else break;
	};

	return array_reverse($breadcrumbs_array,true);//переворачивает массив
};

//10постраничная навигация
function pagenation($page, $count_pages,$modrew = true){
	/* << < 3 4 (5) 6 7 > >> */
	 $back = null;// - ссылка НАЗАД
	 $forward = null;// - ссылка ВПЕРЁД
	 $startpage = null;// - ссылка в начало
	 $endpage = null;// - ссылка в конец
	 $page2left = null;// - вторая страница слева
	 $page1left = null;// - первая страница слева
	 $page2right = null;// - вторая страница справа
	 $page1right = null;// - первая страница справа
	
	$uri = "?";
	if(!$modrew){
		//если есть параметры в запросе
		//$_SERVER['QUERY_STRING'] - строка запроса
		if($_SERVER['QUERY_STRING']){
		foreach($_GET as $key => $value){
			if($key != 'page') $uri .= "{$key}=$value&amp;";
			}
		}
	}else{
		/*$_SERVER['REQUEST_URI'] */
		$url = $_SERVER['REQUEST_URI'];
		$url = explode("?",$url);//по разделителю разбивает строку
		if(isset($url[1]) && $url[1] != ''){
			$params = explode("&",$url[1]);
			foreach($params as $param){
			//если конкретный элемент не совпадает
				if(!preg_match("#page=#",$param)) 
				$uri .= "{$param}&amp;";
			}

		}
	}
	
	if($page > 1){
		$back = "<li><a href='{$uri}page=".($page -1)."'>Назад</a></li>";
	}
	if($page < $count_pages){
		$forward = "<li><a href='{$uri}page=".($page +1)."'>Вперед</a></li>";
	}
	if($page > 3){
		$startpage = "<li><a href='{$uri}page=1'>В начало</a></li>";
	}
	if($page < ($count_pages-2)){
		$endpage = "<li><a href='{$uri}page={$count_pages}'>В конец</a></li>";
	}
	if( $page - 2 > 0 ){
		$page2left = "<li><a href='{$uri}page=".($page-2)."'>".($page-2)."</a></li>";
	}
	if( $page - 1 > 0 ){
		$page1left = "<li><a href='{$uri}page=".($page-1)."'>".($page-1)."</a></li>";
	}
	if( $page + 1 <= $count_pages ){
		$page1right = "<li><a href='{$uri}page=".($page+1)."'>".($page+1)."</a></li>";
	}
	if( $page + 2 <= $count_pages ){
		$page2right = "<li><a href='{$uri}page=".($page+2)."'>".($page+2)."</a></li>";
	}	
	return $startpage.$back.$page2left.$page1left.'<li class="active-page">'.$page.'</li>'.$page1right.$page2right.$forward.$endpage;
};

//функция показывает счетчик продукта

	function website_counter(){
	global $connection;
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date("Y-m-d");


	//указываем были ли посещения за сегодня//
	$sql = "SELECT id FROM visits WHERE date = '$date' ";

	$res = mysqli_query($connection, $sql);

	//если ещё не было посещений//
	if(mysqli_num_rows($res) == 0){
		//очищаем таблицу ips
		$sql = "DELETE FROM ips ";
		mysqli_query($connection,$sql);
		//Заносим в базу ip текущего посетителя
		$sql = "INSERT INTO ips SET ip_adress = '$ip'";
		mysqli_query($connection,$sql);
		//Заносим в базу дату посещения и устанавливаем кол-во просмотров и уникальность посещений в значения 1
		$sql = "INSERT INTO  visits SET date = '$date', hosts = 1, views = 1 ";
		$res_count = mysqli_query($connection,$sql);
		
	}else{
		//если посещения уже были//

		//проверяем, есть ли уже в базе ip, с которого происходит обращение
		$sql = "SELECT id FROM ips WHERE ip_adress = '$ip' ";
		$res = mysqli_query($connection,$sql);
		//если такой ip уже был сегодня
		if(mysqli_num_rows($res) == true){
			//добавляем для текущей даты +1 просмотр
			$sql = "UPDATE visits SET views = views + 1 WHERE date = '$date' LIMIT 1 ";
			mysqli_query($connection,$sql);

		}else{
			//если сегодня такого ip ещё не было//
			//////////////////////////

			//Заносим в базу ip текущего посетителя
			$sql = "INSERT INTO ips SET ip_adress = '$ip'";
			mysqli_query($connection,$sql);

			//добавляем в базу +1 уникального посетителя и +1 просмотр
			$sql = "UPDATE visits SET hosts = hosts + 1, views = views + 1 WHERE date = '$date' ";
			mysqli_query($connection,$sql);
			//$sql = "UPDATE products SET  views = views + 1 WHERE alias = '$product_alias' ";
			//mysqli_query($connection,$sql);

		}
		}

		$sql = "SELECT views , hosts FROM visits WHERE date = '$date' ";
		$res = mysqli_query($connection,$sql);

		$row = mysqli_fetch_assoc($res);
		return $row;
				
	};

////////////////////////////////////
	function website($product_alias){
	global $connection;
	$ip = $_SERVER['REMOTE_ADDR'];

	//указываем были ли посещения за сегодня//
	$sql = "SELECT id FROM products WHERE alias = '$product_alias' ";

	$res = mysqli_query($connection, $sql);

	//если ещё не было посещений//
	if(mysqli_num_rows($res) == 0){
		
		//Заносим в базу ip текущего посетителя
		$sql = "INSERT INTO ips SET ip_adress = '$ip'";
		mysqli_query($connection,$sql);
		//Заносим в базу дату посещения и устанавливаем кол-во просмотров и уникальность посещений в значения 1
		$sql = "INSERT INTO  products SET alias = '$product_alias', hosts = 1, views = 1 ";
		$res_count = mysqli_query($connection,$sql);
		
	}else{
		//если посещения уже были//

		//проверяем, есть ли уже в базе ip, с которого происходит обращение
		$sql = "SELECT id FROM ips WHERE ip_adress = '$ip' ";
		$current_ip = mysqli_query($connection,$sql);
		//если такой ip уже был сегодня
		if(mysqli_num_rows($current_ip) == true){
			//добавляем для текущему просмотру +1 просмотр
			$sql = "UPDATE products SET views = views + 1 WHERE alias = '$product_alias' LIMIT 1";
			mysqli_query($connection,$sql);

		}else{
			//если сегодня такого ip ещё не было//

			//Заносим в базу ip текущего посетителя
			$sql = "INSERT INTO ips SET ip_adress = '$ip'";
			mysqli_query($connection,$sql);

			//добавляем в базу +1 уникального посетителя и +1 просмотр
			$sql = "UPDATE products SET hosts = hosts + 1, views = views + 1 WHERE alias = '$product_alias' ";
			mysqli_query($connection,$sql);
			
		}
		}

		$sql = "SELECT views FROM products WHERE alias = '$product_alias' ";
		$res = mysqli_query($connection,$sql);

		$row = mysqli_fetch_assoc($res);
		return $row;
				
	};
	
/*футнкия показа котегорий админки */
function acategories(){
	global $connection;
	$sql = "SELECT id,title,alias,parent FROM acategories ";
	$res = mysqli_query($connection,$sql);

	$acategories = array();
	//заполняем массив получеными данными
	while($row = mysqli_fetch_assoc($res)){
		$acategories[$row['id']] = $row;
	}
	return $acategories;
};

?>