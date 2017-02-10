<?php defined("CATALOG") or die("Acces denied");?>
<?php include 'header.php';?>

 <?php include 'sidebar.php';?>

		<div id="block_right">
			<div class="block_content">

				<ul class="breadcrumbs">
					<?=$breadcrumbs?>
				</ul>

				<div class="product">

					<?php if($products):?>

						<?php foreach($products as $product):?>

				<div class="block_product">
					<p class="website1"><span><?=$product['views']?></span><img src="<?=PATH?><?=VIEW?>img/ind/views.jpg" alt="текст" /></p>
					<!--<p class="comments"><span>0</span><img src="img/ind/comments.jpg" alt="текст" /></p>-->
					<p class="datatime" ><?=$product['date']?></p>					
                	<h2><a href="<?=PATH?>product/<?=$product['alias']?>" ><?=$product['title']?></a></h2>                	
					<div class="block_img">
                    	<img src="<?=PATH?><?=VIEW?>img/img1/<?=$product['img']?>" alt="текст" />
                	</div>
                	<p class="mini_opisanie"><?=$product['discription']?></p>
                	<!--<p class="price">Цена: <span>20</span> грн</p>-->
                	
                	
                </div>

            			<?php endforeach;?>

					<?php else:?>

						<!--<p>Здесь товаров нет!!!</p>-->
						<div class="404">
                    		<img src="<?=PATH?><?=VIEW?>img/404/404.png?>" alt="404" />
                		</div>

					<?php endif;?>


				</div>
				<div class="clr"></div>

				<?php if($count_pages > 1):?>
				<ul class="pagination">
					<li><?=$pagenation?></li>
				</ul>
				<?php endif;?>

			</div>
		</div>

 <?php include 'footer.php';?>