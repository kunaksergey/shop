<?php
namespace backend\controller;
use core\Controller;
use common\models\Category;

class CategoryController extends Controller{


	//функция создания категории
	public function actionCreate(){
		$model=new Category;
		
		if (isset($_POST['sbm_create_category'])){ 
			$model->load($_POST);  //отправляем массив на парсинг
			var_dump($model);die;
			//$model->save();
		}else{ 	
			$model=Category::findAll("where parent_id is NULL"); //выбор коневых категорий
			$this->render('create',['model'=>$model]);  
		}
	}
}