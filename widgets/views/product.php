<div>
	<h3><a href="/product/<?= $product->id ?>"><?= $product->title ?></a></h3>
	<span><?= $product->formatPrice() ?></span>
	<a href="javascript:{}">Add to cart</a>
	<p><?= $product->description ?></p>
</div>