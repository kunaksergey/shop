<?php
namespace core;
use core\Model;

class ActiveRecord extends Model{

	public function __construct(){
		foreach($this->rules() as $value){
			$this->$value='';
		}
	}


	static function findAll($condition){  //Выборка записей;
		$table =static::getTable(); 
		$sql="Select * from ".$table;
		if($condition){
			$sql.=" {$condition}";
		} 
		
		return Db::getInstance()->query($sql, \PDO::FETCH_ASSOC);
	}

	static function findOne(){

	}

	//Возвращаем название таблицы	
	static function getTable(){
		$class=get_called_class ();
		preg_match('/(\w+)$/i',$class,$matches);
		return strtolower($matches[1]); 
	}

	//Запись в базу;
	public function save(){
		
		 if ($this->IsNewRecord()) {
            return $this->insert(); //если запись новая-записываем
        } else {
            return $this->update(); //если запись была в базе -обновляем
        }	
	}

	//Добавление записи в базу
	protected function insert(){
			echo "Это новая запись";
		
		/*$fields=implode(',', $this->rules());
		$values=implode(',', $this->getPostFild());
				$sql="INSERT INTO ".$this->getTable()."(".$fields.") VALUES (".$values.")";
			echo $sql;*/
			//Db::getInstance()->exec($sql);

	}

	//Обновлление записи в базе
	protected function update(){
	
		echo "Это старая  запись";
	}


	protected function IsNewRecord(){
				
		if(isset($_POST[$this->getPrimaryKey()])) //был ли передан первичный ключ из формы
			return true;						  //если нет,то запись НОВАЯ	
		return false;
	}

	
	function getPostFild(){
		$array=[];
		foreach($this->rules() as $value){
			if (isset($_POST[$value])){
				$array[]=$_POST[$value];

			}
		}
		return $array;
	}

	//Получаем название первичного ключа таблицы
	private function getPrimaryKey(){
		return false;
	}
}