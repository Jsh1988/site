<?php defined("CATALOG") or die("Acces denied");?>
<?php include 'header.php';?>

 <?php include 'sidebar.php';?>

		<div id="block_right">
			<div class="block_content">

				<ul class="breadcrumbs">
					<?=$breadcrumbs?>
				</ul>

				<div class="product">
					<div class="search_product">
							<?php if( isset( $_SESSION['search']['ok'] ) AND $_GET['search'] != ''): ?>
									<div class="search-h2"><h2><?=$_SESSION['search']['ok']?></h2></div>
								<?php foreach($result_search as $result):?>
								<div style="margin-bottom: 5px; ">
                						<h2 class="search_h2"><a href="<?=PATH?>product/<?=$result['alias']?>" ><?=$result['title']?></a></h2>
									<div class="block_img">
                    					<img src="<?=PATH?><?=VIEW?>img/img1/<?=$result['img']?>" alt="<?=$result['title']?>" />
                					</div>
                						<p class="mini_opisanie"><?=$result['discription']?></p>
                						<div class="clr"></div>
								</div>
                				<?php endforeach;?>
                			<?php else :?>
                				<div class="404">
                    				<img src="<?=PATH?><?=VIEW?>img/404/404.png?>" alt="404" />
                				</div>
               				<?php endif;?>
               				<?php unset($_SESSION['search']); ?>

					</div>
				</div>

				<div class="clr"></div>
				<?php if( !empty($_GET['search']) ): ?>
				<?php if($count_pages > 1):?>
				<ul class="pagination">
					<li><?=$pagenation?></li>
				</ul>
				<?php endif;?>
				<?php endif;?>

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