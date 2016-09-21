<?php

namespace app\widgets;
use yii\base\Widget;
use yii\helpers\Html;

class ProductWidget extends Widget
{
	public $product;

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		return $this->render("product", [
			"product" => $this->product,
			"widget" => $this
			]);
		
	}

}