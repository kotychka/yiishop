<div>
	<h3><?= $product->title ?></h3>
	<?php if ($product->image != ""): ?>
	<img src="<?= $product->imageThumb() ?>">
	<?php endif; ?>

	<span><?= $product->formatPrice() ?></span>
	<a href="javascript:{}">Add To Cart</a>
	<p><?= $product->description ?></p>
</div>