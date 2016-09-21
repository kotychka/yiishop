<?php
use yii\widgets\LinkPager;
use app\widgets\ProductWidget;
?>

<div class="products-index">
	<?php foreach($products as $product): ?>
	        <?= ProductWidget::widget(["product" => $product]); ?>
	<?php endforeach; ?>

	<?= LinkPager::widget(["pagination" => $pagination]) ?>
</div>