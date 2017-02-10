<?php defined("CATALOG") or die("Acces denied");?>
<!DOCTYPE html>
<html>
<head>
	<title>WebSimba.dp.ua</title>
	<meta name="google-site-verification" content="QY2Zx5Dy7QQUV6RY_A_TsHJ29AzKL3ChyIW7p-2j8sA" />
	<meta name='yandex-verification' content='49b151c2f6095da7' />
	<meta http-equiv="content-type" content="text/html charset=utf-8" />

	<link rel="shortcut icon" href="<?=PATH?><?=VIEW?>img/ind/favicon.ico" />
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