<?php

use app\widgets\ProductWidget;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">
    <?php foreach($products as $product): ?>
        <?= ProductWidget::widget(["product" => $product]); ?>
    <?php endforeach; ?>
</div>
