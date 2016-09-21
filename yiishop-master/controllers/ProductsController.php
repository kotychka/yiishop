<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;
use app\models\Categories;
use yii\data\Pagination;
use PHPImageWorkshop\ImageWorkshop;

class ProductsController extends Controller
{
	public function actionIndex()
	{
		$query = Products::find()
			->where(["status" => 1]);

		$pagination = new Pagination([
			'defaultPageSize' => 9,
			'totalCount' => $query->count()
		]);

		$products = $query->orderBy("created_at")
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
			
		return $this->render('index', array(
			"products" => $products,
			"pagination" => $pagination
		));
	}

	public function actionProduct($id)
	{
		$product =  Products::findOne($id);

		// $layer = ImageWorkshop::initFromPath('/vagrant/yiishop/web/uploads/example.jpg');

		// echo $layer->getWidth(). "x";
		// echo $layer->getHeight();

		// $layer->resizeInPixel(200, null, true);
		// $layer->save('/vagrant/yiishop/web/uploads', 'example2.jpg', true, null, 95);

		// $layer->resizeInPixel(50, 50);
		// $layer->save('/vagrant/yiishop/web/uploads', 'example3.jpg', true, null, 95);

		// $layer = ImageWorkshop::initFromPath('/vagrant/yiishop/web/uploads/x-forest.png');
		// $topLayer = ImageWorkshop::initFromPath('/vagrant/yiishop/web/uploads/example.jpg');

		// $layer->addLayerOnTop($topLayer, 20, 10, 'LB');

		// $layer->save('/vagrant/yiishop/web/uploads', 'example4.png', true, null, 95);

		return $this->render('product', [
			'product' => $product
		]);
	}

	public function actionCategory($category)
	{
		$category = Categories::findOne($category);
	}

	public function actionExp()
	{
		// $products = Yii::$app->db
		// 	->createCommand('SELECT * FROM products WHERE status=:status')
		// 	->bindValue(':status', 1)
		// 	->queryAll();


		$query = new \yii\db\Query();
		$query->select('title')
			->from('products');

		// if ( == 1) {	
			$query->where(['status' => @$_GET['status']])
			->limit(5);
		// }

		$products = $query->all();

		var_dump($products);

		// $post = Yii::$app->db
		// 	->createCommand('SELECT * FROM post WHERE id=1')
  //           ->queryOne();

  //       $titles = Yii::$app->db
  //        		->createCommand('SELECT title FROM post')
  //            	->queryColumn();

  //       $count = Yii::$app->db
  //       		->createCommand('SELECT COUNT(*) FROM post')
  //            	->queryScalar();

  //       $post = Yii::$app->db->createCommand('SELECT * FROM post WHERE id=:my_id_param AND status=:status')
  //          ->bindValue(':my_id_param', 123)
  //          ->bindValue(':status', 1)
  //          ->queryOne();

  //       $command = Yii::$app->db
  //       		->createCommand('SELECT * FROM post WHERE id=:id')
  //               ->bindParam(':id', $id);

  //       $id = 3;
  //       $post = $command->queryOne();

  //       Yii::$app->db
  //       	->createCommand('UPDATE post SET status=1 WHERE id=1')
  //  			->execute();
	}
}