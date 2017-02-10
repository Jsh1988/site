<?php
defined("CATALOG") or die("Acces denied");

define("DBHOST","localhost");
define("DBUSER","eugene");
define("DBPASS","root");
define("DBNAME","websimba");
define("PATH","http://jsh.ua/");
define("VIEW","views/tpl1/");
define("ADMIN","admin/admin1/");
//define("LINK", 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
define("PERPAGE",4);

//mysqli_connect = помещаем указатель на открытое соединение.
$connection = @mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME)or die("Нет соединения с БД");
//установка кодировки mysqli_set_charset
mysqli_set_charset($connection,"utf8")or die("Не удалось установить кодировку");


?>