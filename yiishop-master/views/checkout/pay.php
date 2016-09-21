<?php
use yii\helpers\Html;
?>

<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml" id="send-money-to-yandex">
    <input type="hidden" name="receiver" value="410011273069610">
    <input type="hidden" name="formcomment" value="<?= $order->products ?>">
    <input type="hidden" name="short-dest" value="Покупка в супер магазине">
    <input type="hidden" name="label" value="<?= $order->products ?>">
    <input type="hidden" name="quickpay-form" value="donate">
    <input type="hidden" name="targets" value="<?= $order->id ?>">
    <input type="hidden" name="sum" value="<?= $order->total ?>" data-type="number" >
    <input type="hidden" name="comment" value="" >
    <input type="hidden" name="need-fio" value="false">
    <input type="hidden" name="need-email" value="true" >
    <input type="hidden" name="need-phone" value="false">
    <input type="hidden" name="need-address" value="false">
    <input type="hidden" name="paymentType" value="AC" />
    <!-- <input type="radio" name="paymentType" value="AC">Банковской картой</input> -->
    <!-- <input type="submit" name="submit-button" value="Перевести"> -->
    <div class="form-group">
    <?= Html::submitButton('Next', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>
</form>