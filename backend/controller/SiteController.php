<?php
namespace backend\controller;
use core\Controller;

class SiteController extends Controller{
	
	public function actionIndex(){
		$this->render('index');
	}
}
