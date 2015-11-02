<?php

include (__DIR__.'/../core/autoload.php');

//use core;
$dbh=core\Db::getInstance();

if (!$dbh) {
	echo('Ошибка соединения: ');exit();         //если connect=false   прерываем программу  
}else var_dump($dbh);die;

//создание категорий
$sqlCategory=" CREATE TABLE category(
		id int NOT NULL,
		name varchar(255) NOT NULL,
		PRIMARY KEY (id)
        	)";
$sqlInsertFirstRowCategory="INSERT INTO category (name) VALUES ('root')";
//cоздание таблицы продуктов
$sqlProduct="CREATE TABLE product(
		id int NOT NULL,
		category_id int ,
		name varchar(255) NOT NULL,
        description text(1000),
        PRIMARY KEY (id),
        FOREIGN KEY (category_id) REFERENCES category(id)
	)";


/*
try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    // use exec() because no results are returned
    $conn->exec($sqlProduct);

    echo "Создана таблица <br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;*/
?>