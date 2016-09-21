<?php

use app\widgets\ProductWidget;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">

     <?php foreach ($products as $product): ?>
        <div>
            
            <?= ProductWidget::widget(["product" => $product]); ?>
                  
        </div>
    <?php endforeach; ?>
</div>
