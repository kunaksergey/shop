<?php 
namespace core;

class Db {
  protected static $_instance; //singleton
  private $dbh;  //указатель базы

  function __construct(){
  $connect=include(__DIR__.'/../config/web.php'); //подключаем конф.файл базы данных
	  try {
	  $options = array(\PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	  $this->dbh = new \PDO($connect['dsn'], $connect['username'], $connect['password'],$options);  //создаем PDO соединения
	   $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); //включам сообщения об ошибках и режим выброса исключений
	  }
     catch(PDOException $e){
   	  echo $sql . "<br>" . $e->getMessage();
     }

  }


static function getInstance(){

if (null === self::$_instance) {
            // создаем новый экземпляр
            self::$_instance = new self();
        }
        // возвращаем созданный или существующий экземпляр
        return self::$_instance->dbh;
 

}

}
?>

