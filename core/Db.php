<?php 
namespace core;

class Db {
  protected static $_instance;
  private $dbh; 
  function __construct(){
    $connect=include(__DIR__.'/../config/web.php'); 

   $this->dbh = new \PDO($connect['dsn'], $connect['username'], $connect['password']);  
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
