<?php
use app\widgets\ProductWidget;

?>

<div class="site-index">
     <?php foreach ($products as $product): ?> 
            <?= ProductWidget::widget(["product" => $product]); ?>       
    <?php endforeach; ?>
</div>