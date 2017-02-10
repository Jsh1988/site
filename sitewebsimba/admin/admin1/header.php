<?php defined("CATALOG") or die("Acces denied");?>
<!DOCTYPE html>
<html>
<head>
	<title>Админка</title>
	<meta http-equiv="content-type" content="text/html charset=utf-8" />

	<link rel="shortcut icon" href="<?=PATH?><?=VIEW?>img/ind/favicon.ico" />
	<link href="<?=PATH?><?=ADMIN?>css/admins.css" rel="stylesheet" type="text/css" />
	
</head>
<body>
<div class="a-block-body">
	<div class="a-block-categories">
		<p><a href="<?=PATH?>">Главная</a></p>
		<p><a href="<?=PATH?>administration">Админка</a></p>

		<?php foreach($acategories as $value):?>
			<p><a href="<?=PATH?><?=$value['alias']?>"><?=$value['title']?></a></p>
		<?php endforeach;?>
	</div>