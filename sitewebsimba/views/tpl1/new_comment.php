<?php defined("CATALOG") or die("Access denied"); ?>
<div class="comments-product" id="comment-<?=$comment['id']?>">
	<div class="block-comments-title<?php if($comment['is_admin']) echo ' block-comments-manager'; ?>">
		<p><em><b><span><?=htmlspecialchars($comment['firstname'])?></span><?=$comment['date']?></b></p>
	</div>
	<div class="block-comments-text"> <?=nl2br(htmlspecialchars($comment['content']))?> </div>
</div>