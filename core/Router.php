<?php
namespace core;

class Router{
	private $controller; //имя контролллера
	private $action; //имя действия
	private $params=array(); //список параметров
	static $obj; //объект Router

	private function __construct(){}
	private function __clone(){}
	//Singlton роутера
	static function init(){
		if (!isset(self::$obj))
			self::$obj=new self;
		return self::$obj;
	}

	//Основная фунцкция роутера
	public function run(){

	    // Разбиваем внутренний путь на сегменты.
	    $segments=explode('/',$this->getUri());

	 	// Первый сегмент — контроллер.
	 	$controllerName=array_shift($segments); 
	 	$namespace=App::init()->controllerNameSpace;

	 	//имя контролллера
	 	$controllerName=($controllerName)?
	 								$controllerName:
	 								App::init()->defaultRoute['controller']; 
	 								//Если нет контроллера, выбираем дефлотный контроллер

	 	//namespace+ИмяКонтролллера+Controller						
	 	$controllerFullName=$namespace.ucfirst($controllerName).'Controller';

	 	//Новый контролллер
	    $this->controller = new $controllerFullName($controllerName);

	     // Второй — действие.
	    $action=ucfirst(array_shift($segments));

	    //Определяем действие. Если нет действия, выбираем дефлотное действие
	    $this->action=($action)?'action'.$action:'action'.App::init()->defaultRoute['action'];
	     

	     // Остальные сегменты — параметры.
	     $this->parameters = $segments;

	     //отправляем роутер в настройку приложения
	     App::init()->router=$this; 	

	     
	    // Если не загружен нужный класс контроллера или в нём нет
	       // нужного метода — 404 
	   if(!is_callable(array($this->controller, $this->action))){
	               header("HTTP/1.0 404 Not Found");
	               return;
	    }

	        	      
	    // Вызываем действие контроллера с параметрами       
	    call_user_func_array(array($this->controller, $this->action), $this->params);
	     
	      
	    // Ничего не применилось. 404.
	  //  header("HTTP/1.0 404 Not Found");
	 
	    return;

	}

   //получаем URI строки запроса
   private function getUri(){
   		return trim($_SERVER['REQUEST_URI'],'/');
   }

   //возвращаем имя котроллера
	public function getController(){
		return $this->controller;
	}

	//возвращаем имя действия
	public function getAction(){
		return $this->action;
	}

	//возвращаем массив параметров
	public function getParams(){
		return $this->params;
	}
     

}