<?php defined("CATALOG") or die("Acces denied");?>
<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$get_one_product['title']?></title>
	<!--<meta http-equiv="content-type" content="text/html charset=utf-8" />-->
	<meta name="description" content="<?=$get_one_product['descriptions']?>" />
	<meta name="keywords" content="<?=$get_one_product['keywords']?>" />

	<link rel="shortcut icon" href="<?=PATH?><?=VIEW?>img/ind/i.ico" />
	<link href="<?=PATH?><?=VIEW?>css/images.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/styles.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/product.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/pb.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/humanity/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/search.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/lightGallery.css" rel="stylesheet" type="text/css" />

<script>
var path = "<?=PATH?>";
var id = "<?=$id_product?>";
</script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.accordion.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/lightGallery.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/script.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/search.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/comments.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/slaider.js"></script>



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
					<?php if($get_one_product):?>
				<div class="product">
				<div class="block_one_product">

					<h2 class="titleh2" ><?=$get_one_product['title']?></h2>
					<div class="block_one_img">
						<img src="<?=PATH?><?=VIEW?>img/img1/<?=$get_one_product['img']?>" alt="текст" />
					</div>
					<p class="mini_opisanie"><?=$get_one_product['content']?></p>
					<p class="datatime" ><?=$get_one_product['date']?></p>
					<p class="comments"><span><?=$count_comments?></span><img src="<?=PATH?><?=VIEW?>img/ind/comments.jpg" alt="альтернативный текст" /></p>
					<p class="website"><span><?=$get_one_product['views']?></span><img src="<?=PATH?><?=VIEW?>img/ind/views.jpg" alt="текст" /></p>

				</div>
				</div>
					<?php else:?>
						<p>Пусто</p>
					<?php endif;?>

					<!--galereya-->
				<?php if($gallery):?>
					<div class="block_imges">
						<h3>Галерея</h3>
						<div class="block_gallery">

							<ul id="lightGallery" class="gallery">
								<?php foreach($gallery as $value):?>
									<?php if($value['mark'] == 0 ): ?>
								<li data-src="<?=PATH?><?=VIEW?>img/img1/<?=$value['photo']?>" data-sub-html="<?=$value['title']?>">
									<?php else: ?>
								<li data-src="<?=$value['link']?>" data-sub-html="<?=$value['title']?>">
									<?php endif;?>

									<a href="#">
										<img src="<?=PATH?><?=VIEW?>img/img1/<?=$value['photo']?>">
									</a>
								</li>
								<?php endforeach;?>
							</ul>

						</div>
					</div>
				<?php else:?>
					<div></div>
				<?php endif;?>

					<!--comments-->
				<div class="block_comments">

						<h3>Комментарии статьи</h3>
						<ul class='comments'>
							<?php echo $comments;?>
						</ul>

						<button class="open-form">Добавить комментарий</button>

						<div class="form-comments">
							<form action="<?=PATH?>comment" method="post" class="form">
								<?php if(isset($_SESSION['auth']['firstname'])):?>
									<p style="display:none;">
										<label for="comment_firstname">Имя:<label>
										<input type="text" name="comment_firstname" id="comment_firstname" value="<?=htmlspecialchars($_SESSION['auth']['firstname'])?>">
									</p>
									<br />
									<p style="display:none;">
										<label for="comment_surname">Фамилия:<label>
										<input type="text" name="comment_surname" id="comment_surname" value="<?=htmlspecialchars($_SESSION['auth']['surname'])?>">
									</p>
								<?php else:?>
									<p>
										<label for="comment_firstname">Имя:<label>
										<input type="text" name="comment_firstname" id="comment_firstname">
									</p>
									<br />
									<p>
										<label for="comment_surname">Фамилия:<label>
										<input type="text" name="comment_surname" id="comment_surname">
									</p>
								<?php endif;?>

								<p>
									<label for="comment_text">Текст:<label>
									<textarea name="comment_text" id="comment_text" cols="30" rows="5"></textarea>
								</p>

								<input type="hidden" id="parent" name="parent" value="0">

							</form>
						</div>

						<div id="loader"><span></span></div>
						<div id="errors"></div>

				</div>
					<!--comments-->


				<div class="clr"></div>

			</div>
		</div>

 <?php include 'footer.php';?>