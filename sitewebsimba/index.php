<?php
error_reporting(E_ALL);
define("CATALOG",TRUE);
session_start();
include 'config.php';
require 'phpmailer/PHPMailerAutoload.php';

$routes = array(
	array('url' => '#^$|^\?#', 'view' => 'category'),
	array('url' =>'#^product/(?P<product_alias>[a-z0-9-]+)#i','view' => 'product'),
	array('url' =>'#^category/(?P<category_alias>[a-z0-9-]+)#i','view' => 'category'),
	array('url' =>'#^authorization#i','view' => 'authorization'),
	array('url' =>'#^exit#i','view' => 'exit'),
	array('url' =>'#^forgotpass#i','view' => 'forgotpass'),
	array('url' =>'#^registration#i','view' => 'registration'),
	array('url' =>'#^comment#i','view' => 'comment'),
	array('url' =>'#^page/(?P<page_alias>[a-z0-9-]+)#i','view' => 'page'),
	array('url' =>'#^search#i','view' => 'search'),
	array('url' =>'#^administration#i','view' => 'administration'),
	array('url' =>'#^acat#i','view' => 'acat'),
	array('url' =>'#^cat#i','view' => 'cat'),
	array('url' =>'#^menu#i','view' => 'menu'),
	array('url' =>'#^article#i','view' => 'article'),
	array('url' =>'#^gallery#i','view' => 'gallery'),
	array('url' =>'#^users#i','view' => 'users'),
	array('url' =>'#^comm#i','view' => 'comm')	
);



$url = ltrim($_SERVER['REQUEST_URI'],'/');


foreach($routes as $route){
	if(preg_match($route['url'], $url, $match)){
		$view = $route['view'];
		break;
	}
}
 
if(empty($match)){
	include VIEW .'404.php';
	exit;
}

extract($match);


include "controllers/{$view}_controller.php";
?>