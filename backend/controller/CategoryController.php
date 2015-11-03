<?php
namespace backend\controller;
use core\Controller;

class CategoryController extends Controller{

	public function actionCreate(){
		$this->render('create');
	}
}