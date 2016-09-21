<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;
use app\models\Categories;
use yii\data\Pagination;

class ProductsController extends Controller 
{
	public function actionIndex()
	{
		$query = Products::find()
			->where(["status" => 1]);

		$pagination = new Pagination([
			'defaultPageSize' => 3,
			'totalCount' => $query->count()
		]);

		$products = $query->orderBy("created_at")
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();


		return $this->render('index', array(
		 	"products" => $products,
		 	"pagination" => $pagination,
		 	// "price" => $price,
		 	// "created_at" => $created_at
		 	));

	}

	public function actionProduct($id)
	{
		$product = Products::findOne($id);

		return $this->render('product', [
			'product' => $product
			]);
	}

	public function actionCategory($category)
	{
		$category = Categories::findOne($category);
		
		return $this->render('category', [
			'category' => $category
			]);
	}

	public function actionExp()
	{
		// $products = Yii::$app->db
		// 	->createCommand('SELECT * FROM products WHERE
		// status=:status')
		//  ->bindValue(':status', 1)
		// 	->queryAll();

		$query = new \yii\db\Query();
		$query->select('title')
			->from('products');

		// if ( == 1) {
			$query->where(['status' => @$GET['status']])
			->limit(5);
		// }
		
		var_dump($products);
	}
}

class StaticClass
{
	public static $counter=0;

	public function __construct()
	{
		self::$counter++;
	}

	public function get()
	{

		return self::$counter;
	}
	
	// public static function find() 
	// {
	// 	return "hello";
	// }
}