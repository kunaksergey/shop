<?php
function __autoload($class){
	$class= str_replace('\\','/',$class); //заменяем обратные слеши на прямые
	include(__DIR__."/../".$class.".php"); //подлючаем класс;
}
?>