<?php
defined("CATALOG") or die("Acces denied");

include 'models/main_model.php';
include 'lib/pbkv.php';
include 'lib/eventCalendar.php';
include 'lib/bxslider.php';

$categories = get_categories();
$tree_categories = map_tree($categories);
$menu_categories = categories_to_string($tree_categories);

//получение страниц меню
$pages = get_pages();

$website_counter = website_counter();
$acategories = acategories();

?>