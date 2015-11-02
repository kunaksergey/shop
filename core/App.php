<?php 
namespace core; //Пространсво имен Core

use \core\Router; //
class App{
	private static $obj;
	
	public $router;
	private function __construct(){}
	private function __clone(){}

	//Singlton приложения
	static function init(){
		if (!isset(self::$obj))
			self::$obj=new self;
		return self::$obj;
	}

	//Главная функция запуска
	public function run($config){
		$this->extr($config); //раскручиваем конфиг
		Router::init()->run(); //вызываем роутер
	}

	//создаем из массива набор переменных
	private function extr($config){
		foreach($config as $value=>$key){
			$this->$value=$key;
		}
	}



}