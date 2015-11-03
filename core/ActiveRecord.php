<?php
namespace core;

class ActiveRecord{

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

	static function getTable(){
		$class=get_called_class ();
		preg_match('/(\w+)$/i',$class,$matches);
		return strtolower($matches[1]); 
	}
	
}