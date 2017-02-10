<?php defined("CATALOG") or die("Acces denied");?>
 <!DOCTYPE html>
<html>
<head>
	<title><?=$page['title']?></title>
	<meta http-equiv="content-type" content="text/html charset=utf-8" />
	<meta name="description" content="<?=$page['description']?>" />
	<meta name="keywords" content="<?=$page['keywords']?>" />

	<link rel="shortcut icon" href="<?=PATH?><?=VIEW?>img/ind/qicon.ico" />
	<link href="<?=PATH?><?=VIEW?>css/styles.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/search.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/pb.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/humanity/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />

<script>
var path = "<?=PATH?>";
</script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.accordion.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/script.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/search.js"></script>

</head>
<body>
	<div id="block_body">

		<div id="block_header">

			<div class="logo">
				<h1><a href="<?=PATH?>">WebSimba.<span>dp.ua</span></a></h1>
            	<p>Интересные статьи</p>
			</div>

			<div class = "block_search">

			<form action="<?=PATH?>search" method="get">
            	<ul class="search">
               		 <li>
                	    <input type="text" id="autocomplete" class="search" name="search" />
               		 </li>
               		 <li>
                	    <input type="submit" class="search-go" name="go-search" value="поиск"  />
               	 	</li>
           		</ul>
        	</form>

        	</div>

		</div>

		<div id="block_menu">
			<ul>
				<?php foreach($pages as $key => $link):?>

					<?php if($link == 'Главная'): ?>

						<li><a href="<?=PATH?>"><?=$link?></a></li>

					<?php else: ?>

						<li><a href="<?php echo PATH . 'page/' . $key;?>"><?=$link?></a></li>

					<?php endif;?>

					<?php endforeach;?>
			</ul>
		</div>

 <?php include 'sidebar.php';?>

		<div id="block_right">
			<div class="block_content">

				<ul class="breadcrumbs">
					<?=$breadcrumbs?>
				</ul>

				<div class="product">
					<div class="block_one_product">

					<h2 class="titleh2" ><?=$page['title']?></h2>
					<div class="block_one_img_menu">
						<img src="<?=PATH?><?=VIEW?>img/menuimg/<?=$page['img']?>" alt="текст" />
					</div>
					<p class="mini_opisanie"><?=$page['content']?></p>
				</div>

				</div>
				<div class="clr"></div>

			</div>
		</div>

		<div id="block_footer">
			
				<ul>
					<li align="center">&copy; websimba.dp.ua, <?=date('Y')?>
						<p>интересные статьи</p>
					</li>
				</ul>

		</div>



	</div>