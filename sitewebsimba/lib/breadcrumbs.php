<?php
defined("CATALOG") or die("Acces denied");

	//хлебные крошки
	$breadcrumbs_array = breadcrumbs($categories,$id);

	if($breadcrumbs_array){
		$breadcrumbs = "<li><a href='".PATH."'>Главная</a></li> - ";

		foreach($breadcrumbs_array as $alias => $title){
			$breadcrumbs .= "<li><a href='".PATH."category/{$alias}'>{$title}</a></li> - ";
		}
		if(!isset($get_one_product)){
			$breadcrumbs = rtrim($breadcrumbs, " - ");
			$breadcrumbs = preg_replace("#(.+)?<a.+>(.+)</a>$#","$1$2",$breadcrumbs);
		}else{
			$breadcrumbs .= "<li>{$get_one_product['title']}</li>";
			}


	}else{
		$breadcrumbs = "<li><a href='".PATH."'>Главная</a></li> - <li>Статьи</li>";		
	}


?>