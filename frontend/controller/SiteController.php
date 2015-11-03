<?php
namespace frontend\controller;
use core\Controller;
use common\models\Category;

//Основной контроллер при запуске
class SiteController extends Controller{
	
	public function actionIndex(){
		$model=Category::findAll("where parent_id is NULL"); //выбор коневых категорий
		$this->render('index',['model'=>$model]);  
	}
}