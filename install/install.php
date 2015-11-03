<?php

include (__DIR__.'/../core/autoload.php');

//use core;
$dbh=core\Db::getInstance();

if (!$dbh) {
	echo('Ошибка соединения: ');exit();         //если connect=false   прерываем программу  
}else 

//создание категорий
$sqlCategory=" CREATE TABLE category(
		id int NOT NULL AUTO_INCREMENT,
		parent_id int,
		name varchar(255) NOT NULL,
		img varchar(255),
		PRIMARY KEY (id)
        	)";
//корень категорий
//$sqlInsertFirstRowCategory="INSERT INTO category (name) VALUES ('root')";

//cоздание таблицы продуктов
$sqlProduct="CREATE TABLE product(
		id int NOT NULL AUTO_INCREMENT,
		category_id int ,
		name varchar(255) NOT NULL,
        description text(1000),
        PRIMARY KEY (id),
        FOREIGN KEY (category_id) REFERENCES category(id)
	)";


 $dbh->exec($sqlCategory);
 echo "Создана таблица категорий<br/>";
 /*$dbh->exec($sqlInsertFirstRowCategory);
 echo "Создан корень категорий<br/>";
*/
 $dbh->exec($sqlProduct);
 echo "Создана таблица продуктов<br/>";

 $dbh = null;
?>