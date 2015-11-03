<?php
namespace core;
use core;

class Controller {
    private $view;
 	protected $pathView;
 	protected $layouts='main';
 		
    public function __construct($controllerName){
        // используем наш View, описанный ранее
        $this->view = new View();

        //вычисляем путь к представлениям контроллера
        $this->pathView=__ROOT__.'/../view/'.$controllerName;
       
     }   
    //Возвращаем имя текущего класса
 	public function __toString(){
 		return  get_class($this); 
 	}

 	//Отображение
 	protected function render($action,$model=[]){
 			$this->view->render($this->pathView.'/'.$action.'.php',$this->layouts,$model);
 	
 	}


    // другие полезные методы вроде redirect($url);
}