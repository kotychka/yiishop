<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;

class CartController extends Controller
{
	public function actionIndex()
	{
		$cart = Yii::$app->session->get("cart", []);
		$ids = array_keys($cart);
		$products = Products::findAll($ids);

		return $this->render("index", [
			"products" => $products
		]);
	}
	
	public function actionAdd($id)
	{
		$products = Yii::$app->session->get("cart", []);

		if (isset($products[$id])) {
			$products[$id] += 1;
		} else {
			$products[$id] = 1;
		}

		Yii::$app->session->set("cart", $products);

		var_dump($products);
	}

	public function actionRemove($id)
	{
		$products = Yii::$app->session->get("cart", []);
		unset($products[$id]);
		Yii::$app->session->set("cart", $products);

		var_dump($products);
	}	


}