<?php
namespace core;

class Model{

	//создаем свойства объекта из $_POST, $_GET... и т.д
	public function load($values){

	if (is_array($values)) {  //Массив ли передали
            foreach ($values as $name => $value) {
            	 if (isset($this->$name)){  //Если существуют свойства указанные в rules
                    $this->$name = $value;
                 }   
            } 
            return true;
        }
      return felse;  
	}
}