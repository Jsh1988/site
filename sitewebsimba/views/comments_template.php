<?php defined("CATALOG") or die("Access denied"); ?>
<li>
	<div class="comments-product">

		<div class="block-comments-title<?php if($category['is_admin']) echo ' block-comments-manager'; ?>">
			<p><em><b><span><?=htmlspecialchars($category['firstname'])?></span><?=$category['date']?></b></p>
		</div>
		<div class="block-comments-text">
			<?=nl2br(htmlspecialchars($category['content']))?>
		</div>
		<div class="block-comments-otvet">
			<p class="open-form" ><a class="" data="<?=$category['id']?>" >Ответить на комментарий</a></p>
		</div>

	</div>
	<?php if( isset($category['childs']) && $category['childs'] ): ?>
	<ul>
		<?php echo categories_to_string($category['childs'], 'comments_template.php'); ?>
	</ul>
	<?php endif; ?>
</li>