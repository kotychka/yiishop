<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Orders;
use app\models\Products;

class CheckoutController extends Controller
{
	public function actionIndex()
	{
		$cart = Yii::$app->session->get("cart", []);
		$ids = array_keys($cart);
		$products = Products::findAll($ids);
		$total = 0;
		$text = "";

		foreach ($products as $product) {
			$total += $product->price * $cart[$product->id];
			$text .= $product->title . ":". $product->id ." | ";	
		}

		$model = new Orders();

		if ($model->load(Yii::$app->request->post()) ) {
			$model->total = $total; 
			$model->products = $text;
			$model->save();
            return $this->redirect(['pay', 'id' => $model->id]);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
	}

	public function actionPay()
	{
		$order = Orders::findOne(Yii::$app->request->get("id"));

		return $this->render("pay",[
			"order" => $order
		]);
	}

	public function actionConfirm()
	{

	}
}